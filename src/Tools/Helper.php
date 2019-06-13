<?php


namespace App\Tools;



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

    public static function sommeDuree(array $coursParcours)
    {
        $nbrCours = [] ;
        for ($i = 0; $i < count($coursParcours); $i++)
        {
            $nbrCours[$i] = $coursParcours[$i]->getCours()->getDuree();
        }

    }
}