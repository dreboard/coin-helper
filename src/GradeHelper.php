<?php


namespace App\Helpers;


class GradeHelper
{
    /**
     * @var array[]|string[]
     */
    private static array $proofs;
    /**
     * @var array[]
     */
    public array $strikes = [
        'Business','Enhanced', 'Uncirculated','Matte Finish','Matte Proof',
        'Proof','Reverse Proof','Satin Finish','Special Mint','Special Strike'
    ];

    /**
     * @var array[]
     */
    public array $business = [
        'Business','Enhanced', 'Uncirculated','Matte Finish',
        'Satin Finish','Special Mint','Special Strike'
    ];

    /**
     * @var array[]
     */
    public array $special = [
        'Business','Enhanced', 'Uncirculated','Matte Finish',
        'Satin Finish','Special Mint','Special Strike'
    ];

    /**
     * @var array[]
     */
    private static array $proofs = ['Proof', 'Matte Proof', 'Reverse Proof'];

    public static function gradePrefix($strike)
    {
        if(in_array($strike, self::$business)){
            return "MS-";
        }
        if(in_array($strike, self::$special)){
            return "SP-";
        }
        if(in_array($strike, self::$proofs)){
            return "PRS-";
        }
        return "MS-";
    }

}
