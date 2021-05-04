<?php

namespace App\Helpers;

use DateTime;
use \Illuminate\Container\Container as Container;
use \Illuminate\Support\Facades\Facade as Facade;
use Illuminate\Support\Facades\DB;
use App\Helpers\AttributeHelper;

/**
 * Class CoinHelper
 * @package App\Http\Helpers
 */
abstract class CoinHelper
{

    /**
     * @var array
     */
    public array $typesList = [
        48 => 'Liberty Cap Half Cent',
        45 => 'Braided Hair Half Cent',
        46 => 'Classic Head Half Cent',
        47 => 'Draped Bust Half Cent',
        1 => 'Flying Eagle',
        51 => 'Flowing Hair Large Cent',
        89 => 'Braided Hair Liberty Head Large Cent',
        88 => 'Coronet Head Cent',
        87 => 'Classic Head Large Cent',
        86 => 'Draped Bust Large Cent',
        2 => 'Lincoln Wheat',
        3 => 'Lincoln Memorial',
        4 => 'Union Shield',
        5 => 'Indian Head Cent',
        6 => 'Lincoln Bicentennial',
        85 => 'Liberty Cap Large Cent',
        49 => 'Two Cent Piece',
        50 => 'Silver Three Cent',
        84 => 'Nickel Three Cent',
        35 => 'Return to Monticello',
        28 => 'Flowing Hair Half Dime',
        27 => 'Draped Bust Half Dime',
        26 => 'Liberty Cap Half Dime',
        25 => 'Seated Liberty Half Dime',
        23 => 'Jefferson Nickel',
        22 => 'Indian Head Nickel',
        21 => 'Liberty Head Nickel',
        20 => 'Shield Nickel',
        34 => 'Westward Journey',
        43 => 'Liberty Cap Dime',
        8 => 'Seated Liberty Dime',
        7 => 'Draped Bust Dime',
        9 => 'Barber Dime',
        10 => 'Winged Liberty Dime',
        11 => 'Roosevelt Dime',
        44 => 'Twenty Cent Piece',
        130 => 'Crossing the Delaware',
        15 => 'Standing Liberty',
        14 => 'Barber Quarter',
        13 => 'Seated Liberty Quarter',
        111 => 'Liberty Cap Quarter',
        12 => 'Draped Bust Quarter',
        16 => 'Washington Quarter',
        17 => 'State Quarter',
        18 => 'District of Columbia and US Territories',
        114 => 'Commemorative Quarter',
        42 => 'America the Beautiful Quarter',
        41 => 'Capped Bust Quarter',
        37 => 'Franklin Half Dollar',
        38 => 'Walking Liberty',
        39 => 'Barber Half Dollar',
        60 => 'Kennedy Half Dollar',
        57 => 'Seated Liberty Half Dollar',
        54 => 'Draped Bust Half Dollar',
        53 => 'Flowing Hair Half Dollar',
        52 => 'Capped Bust Half Dollar',
        29 => 'Commemorative Half Dollar',
        101 => 'Silver American Eagle',
        110 => 'American Innovation Dollar',
        115 => 'Commemorative Gold Dollar',
        112 => 'Commemorative Dollar',
        40 => 'Susan B Anthony Dollar',
        64 => 'Peace Dollar',
        63 => 'Sacagawea Dollar',
        62 => 'Flowing Hair Dollar',
        61 => 'Draped Bust Dollar',
        59 => 'Seated Liberty Dollar',
        58 => 'Gobrecht Dollar',
        30 => 'Eisenhower Dollar',
        31 => 'Presidential Dollar',
        55 => 'Liberty Head Gold Dollar',
        32 => 'Trade Dollar',
        33 => 'Morgan Dollar',
        65 => 'Indian Princess Gold Dollar',
        66 => 'Liberty Cap Quarter Eagle',
        116 => 'Commemorative Quarter Eagle',
        70 => 'Indian Head Quarter Eagle',
        69 => 'Liberty Head Quarter Eagle',
        68 => 'Classic Head Quarter Eagle',
        67 => 'Turban Head Quarter Eagle',
        127 => 'Coronet Head Quarter Eagle',
        71 => 'Indian Princess Three Dollar',
        72 => 'Four Dollar Stella',
        118 => 'Commemorative Five Dollar',
        121 => 'Capped Bust Half Eagle',
        128 => 'Coronet Head Half Eagle',
        78 => 'Indian Head Half Eagle',
        77 => 'Tenth Ounce Gold',
        76 => 'Liberty Head Half Eagle',
        75 => 'Classic Head Half Eagle',
        74 => 'Liberty Cap Half Eagle',
        73 => 'Turban Head Half Eagle',
        124 => 'Tenth Ounce Buffalo',
        119 => 'Commemorative Ten Dollar',
        120 => 'Tenth Ounce Platinum',
        125 => 'Coronet Head Eagle',
        126 => 'Liberty Cap Eagle',
        122 => 'First Spouse',
        79 => 'Turban Head Eagle',
        80 => 'Liberty Head Eagle',
        81 => 'Indian Head Eagle',
        82 => 'Quarter Ounce Gold',
        123 => 'Quarter Ounce Buffalo',
        91 => 'Coronet Head Double Eagle',
        92 => 'Saint Gaudens Double Eagle',
        95 => 'Half Ounce Gold',
        109 => 'American Palladium Eagle',
        93 => 'Half Ounce Buffalo',
        94 => 'Quarter Ounce Platinum',
        98 => 'Half Ounce Gold',
        97 => 'One Ounce Buffalo',
        117 => 'Commemorative Fifty Dollar',
        99 => 'One Ounce Gold',
        108 => 'Gold American Eagle',
        96 => 'Half Ounce Platinum',
        100 => 'One Ounce Platinum',
        129 => 'American Liberty Union'
    ];

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
    public array $proofs = ['Proof', 'Matte Proof', 'Reverse Proof'];

    /**
     * @var array[]
     */
    public array $snowTypes = ['Indian Head', 'Flying Eagle'];

    /**
     * @var array[]
     */
    public array $vamTypes = ['Morgan Dollar', 'Peace Dollar'];

    /**
     * @var array[]
     */
    public array $firstDayCats = ['Dollar', 'Quarter', 'Nickel'];

    /**
     * @var array[]
     */
    public array $colorCategories = ['Small Cent', 'Large Cent', 'Half Cent'];

    /**
     * @var array[]
     */
    public array $bandTypes = ['Roosevelt Dime', 'Winged Liberty Dime'];

    /**
     * @var array[]
     */
    public array $seatedTypes = ['Seated Liberty Half Dime', 'Seated Liberty Dime', 'Seated Liberty Quarter', 'Seated Liberty Half Dollar', 'Seated Liberty Dollar'];

    /**
     * @var array[]
     */
    public array $mintsetTypes = ['Westward Journey', 'Lincoln Bicentennial', 'Susan B Anthony Dollar', 'Presidential Dollar', 'Sacagawea Dollar', 'Commemorative Half Dollar', 'Tenth Ounce Gold', 'Quarter Ounce Gold', 'Half Ounce Gold', 'One Ounce Gold', 'Quarter Ounce Platinum'];

    /**
     * @var array[]
     */
    public array $folderTypes = ['Flying Eagle', 'Indian Head Nickel', 'Westward Journey', 'Jefferson Nickel', 'Return to Monticello', 'Lincoln Wheat', 'Lincoln Memorial', 'Lincoln Bicentennial', 'Union Shield', 'Winged Liberty Dime', 'Roosevelt Dime', 'Washington Quarter', 'State Quarter', 'Walking Liberty', 'Kennedy Half Dollar', 'Franklin Half Dollar', 'Susan B Anthony Dollar', 'Presidential Dollar', 'Sacagawea Dollar', 'Eisenhower Dollar'];

    /**
     * @var array[]
     */
    public array $rollTypes = ['Flying Eagle', 'Indian Head Nickel', 'Westward Journey', 'Jefferson Nickel', 'Return to Monticello', 'Lincoln Wheat', 'Lincoln Memorial', 'Lincoln Bicentennial', 'Union Shield', 'Winged Liberty Dime', 'Roosevelt Dime', 'Washington Quarter', 'Walking Liberty', 'Kennedy Half Dollar', 'Franklin Half Dollar', 'Susan B Anthony Dollar', 'Presidential Dollar', 'Sacagawea Dollar', 'Eisenhower Dollar', 'District of Columbia and US Territories', 'State Quarter', 'America the Beautiful Quarter'];

    /**
     * @var array[]
     */
    public array $boxTypes = ['Indian Head Nickel', 'Westward Journey', 'Jefferson Nickel', 'Return to Monticello', 'Lincoln Wheat', 'Lincoln Memorial', 'Lincoln Bicentennial', 'Union Shield', 'Winged Liberty Dime', 'Roosevelt Dime', 'Washington Quarter', 'Walking Liberty', 'Kennedy Half Dollar', 'Franklin Half Dollar', 'Susan B Anthony Dollar', 'Presidential Dollar', 'Sacagawea Dollar', 'Eisenhower Dollar', 'District of Columbia and US Territories', 'State Quarter', 'America the Beautiful Quarter'];

    /**
     * @var array[]
     */
    public array $albumCategories = ['Small Cent', 'Large Cent', 'Half Cent'];

    /**
     * @var array[]
     */
    public array $fullTypes = [
        'Jefferson Nickel',
        'Standing Liberty',
        'Winged Liberty Dime',
        'Franklin Half Dollar',
        'Roosevelt Dime'];

    /**
     * @var array[]
     */
    public array $satinTypes = ['Lincoln Wheat', 'Lincoln Memorial', 'Lincoln Bicentennial', 'Sacagawea Dollar'];

    /**
     * @var array[]
     */
    public array $cameoTypes = [
        'Lincoln Wheat', 'Lincoln Memorial', 'Jefferson Nickel',
        'Winged Liberty Dime', 'Roosevelt Dime', 'Washington Quarter',
        'Walking Liberty', 'Kennedy Half Dollar', 'Franklin Half Dollar',
        'Susan B Anthony Dollar', 'Presidential Dollar', 'Sacagawea Dollar',
        'Eisenhower Dollar', 'Commemorative Half Dollar', 'Silver Dollar',
        'Tenth Ounce Gold', 'Quarter Ounce Gold', 'Half Ounce Gold',
        'One Ounce Gold', 'Tenth Ounce Buffalo', 'Quarter Ounce Buffalo',
        'Half Ounce Buffalo', 'One Ounce Buffalo', 'Tenth Ounce Platinum',
        'Quarter Ounce Platinum', 'Half Ounce Platinum', 'One Ounce Platinum'
    ];

    /**
     * @var array[]
     */
    public array $ultraCameoTypes = [
        'Lincoln Wheat', 'Lincoln Memorial', 'Jefferson Nickel',
        'Winged Liberty Dime', 'Roosevelt Dime', 'Washington Quarter',
        'Walking Liberty', 'Kennedy Half Dollar', 'Franklin Half Dollar',
        'Susan B Anthony Dollar', 'Presidential Dollar', 'Sacagawea Dollar',
        'Eisenhower Dollar', 'Commemorative Half Dollar', 'Silver Dollar',
        'Tenth Ounce Gold', 'Quarter Ounce Gold', 'Half Ounce Gold',
        'One Ounce Gold', 'Tenth Ounce Buffalo', 'Quarter Ounce Buffalo',
        'Half Ounce Buffalo', 'One Ounce Buffalo', 'Tenth Ounce Platinum',
        'Quarter Ounce Platinum', 'Half Ounce Platinum', 'One Ounce Platinum'
    ];

    /**
     * @var array[]
     */
    public array $deepCameoTypes = [
        'Lincoln Wheat', 'Lincoln Memorial', 'Jefferson Nickel', 'Winged Liberty Dime',
        'Roosevelt Dime', 'Washington Quarter', 'Walking Liberty',
        'Kennedy Half Dollar', 'Franklin Half Dollar', 'Susan B Anthony Dollar',
        'Presidential Dollar', 'Sacagawea Dollar', 'Eisenhower Dollar',
        'Commemorative Half Dollar', 'Silver Dollar', 'Tenth Ounce Gold',
        'Quarter Ounce Gold', 'Half Ounce Gold', 'One Ounce Gold',
        'Tenth Ounce Buffalo', 'Quarter Ounce Buffalo', 'Half Ounce Buffalo',
        'One Ounce Buffalo', 'Tenth Ounce Platinum', 'Quarter Ounce Platinum',
        'Half Ounce Platinum', 'One Ounce Platinum'
    ];


    /**
     *
     */
    static public function getModernCoins()
    {

    }

    /**
     * Array of copper coins to add color attribute
     * @return array
     */
    static public function getColorCategories(): array
    {
        return ['Small Cent', 'Large Cent', 'Half Cent'];
    }

    /**
     * Array of Seated Types
     * @example {k=cointypes_id, v=coinType}
     * @return array
     */
    static public function getSeatedTypes(): array
    {
        //return DB::raw('SELECT * FROM ViewSeatedLibertyTypes');
        return [
            8 => 'Seated Liberty Half Dime',
            13 => 'Seated Liberty Dime',
            25 => 'Seated Liberty Quarter',
            57 => 'Seated Liberty Half Dollar',
            59 => 'Seated Liberty Dollar'
        ];
    }

    /**
     * Array of Draped Types
     * @example {k=cointypes_id, v=coinType}
     * @return array
     */
    static public function getDrapedTypes(): array
    {
        return [
            7 => 'Draped Bust Half Cent',
            12 => 'Draped Bust Large Cent',
            27 => 'Draped Bust Half Dime',
            47 => 'Draped Bust Dime',
            54 => 'Draped Bust Quarter',
            61 => 'Draped Bust Half Dollar',
            86 => 'Draped Bust Dollar'
        ];
    }

    /**
     * Array of Capped Types
     * @example {k=cointypes_id, v=coinType}
     * @return array
     */
    static public function getCappedTypes(): array
    {
        return [
            26 => 'Liberty Cap Half Dime',
            41 => 'Liberty Cap Dime',
            43 =>'Capped Bust Quarter',
            52 => 'Capped Bust Half Dollar',
            121 => 'Capped Bust Half Eagle'
        ];
    }



    /**
     * @return array[]
     */
    static public function collected()
    {
        return [
            0 => [
                'id' => 1,
                'userID' => 1,
                'coinID' => 1,
                'coinGrade' => 'MS-64',
                'enterDate' => (new DateTime())->format('Y-m-d'),
                'purchasePrice' => '123.56',
                'nickName' => 'The Coin'
            ]

        ];
    }
}
