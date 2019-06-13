<?php


namespace App\Tools;



use App\Entity\Formation;
use App\Entity\ParcoursFormation;


class Helper
{
    public static function abrevation(array $formation)
    {
        $listeAbre = [];
        $listeLibelle = [];
        for ($i = 0; $i < count($formation); $i++)
        {
            $listeLibelle[$i] = $formation[$i]->getParcoursFormation()->getLibelle();
        }

         for ($i = 0; $i < count($listeLibelle); $i++)
         {
             $abre = '';
             $temp = [];
             $temp = explode(' ', $listeLibelle[$i]);
             for ($j = 0; $j < count($temp); $j++)
             {

                 $abre .= substr($temp[$j], 0, 1);
             }
            $listeAbre[$i] = $abre;
         }
         return $listeAbre;
    }

    public static function sommeDuree(ParcoursFormation $parcoursFormation, Formation $formation)
    {
        $coursParcours = $parcoursFormation->getCoursParcours();
        $nbrHeureTotal = 0;

        foreach ($coursParcours as $coursParcour)
        {
            $nbrHeureTotal += $coursParcour->getCours()->getDuree();
        }
        if ($nbrHeureTotal !== 0)
        {
            $nbrJours = 0;
            while ($nbrHeureTotal>0)
            {
                $nbrJours++;
                $nbrHeureTotal -= 7;
            }


            $dateFin = clone($formation->getDateDebut());
            date_add( $dateFin, date_interval_create_from_date_string( $nbrJours.' weekdays' ) );

            $formation->setDateFin($dateFin);

        }
        return $formation;
    }

}