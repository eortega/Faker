<?php
namespace Faker\Provider\es_MX;

class Address extends \Faker\Provider\Address
{
    protected static $cityPrefix = array('Villa', 'San', 'Puerto');
    protected static $postcode = array('#####');
    protected static $buildingNumber = array('###', '##', '#');
    protected static $streetPrefix = array(
        'Calle', 'Avenida', 'Av.', 'Cl.', 'Carretera', 'Callejón', 'Vereda'
    );
    protected static $secondaryAddressFormats = array('Nro #', 'Piso #', 'Casa #', 'Hab. #', 'Apto #', 'Nro ##', 'Piso ##', 'Casa ##', 'Hab. ##', 'Apto ##');

    protected static $streetNameFormats = array(
        '{{streetPrefix}} {{lastName}}',
    );

    protected static $cityFormats = array(
        '{{cityPrefix}} {{firstName}}',
    );

    /**
     * @example 'East'
     */
    public static function cityPrefix()
    {
        return static::randomElement(static::$cityPrefix);
    }

    protected static $state = array(
      1=> "Aguascalientes",  2=> "Baja California",  3=> "Baja California Sur",   4=> "Campeche",   5=> "Chihuahua",  6=> "Chiapas",  7=> "Coahuila de Zaragoza",  8=> "Colima",   9=> "Distrito Federal",  10=> "Durango",
      11=> "Guerrero", 12=> "Guanajuato", 13=> "Hidalgo",14=> "Jalisco", 15=> "México",   16=> "Michoacán de Ocampo",  17=> "Morelos",  18=> "Nayarit",  19=> "Nuevo León", 20=> "Oaxaca",
      21=> "Puebla",    22=> "Querétaro Arteaga", 23=> "Quintana Roo",  24=> "Sinaloa",  25=> "San Luís Potosí", 26=> "Sonora", 27=> "Tabasco", 28=> "Tamaulipas", 29=> "Tlaxcala", 30=> "Veracruz Llave", 31=> "Yucatán", 32=> "Zacatecas");
      /**
      * @link https://es.wikipedia.org/wiki/C%C3%B3digo_postal_mexicano
      **/
    protected static $postcodeRangesByState=array(
      1=>'20', 2=> "21-22", 3=> "23", 4=> "24", 5=> "31-33", 6=> "29-30", 7=> "25-27", 8=> "28", 9=> "01-16", 10=> "34-35",
      11=> "39-41",12=> "36-38",13=> "42-43",14=> "44-49",15=> "50-57",16=> "58-61", 17=> "62",18=> "63",19=> "64-67",
      20=> "68-71", 21=> "72-75",22=> "76",23=> "77", 24=> "80-82",25=> "78-79",26=> "83-85",27=> "86",28=> "87-89",29=> "90",30=> "91-96",31=> "97",32=>'98-99'
    );

    /**
     * @example 'Avenida'
     */
    public static function streetPrefix()
    {
        return static::randomElement(static::$streetPrefix);
    }

         /**
         * @example 'Zacatecas'
         */
        public static function state()
        {
            return static::randomElement(array_values(static::$state));
        }

        /**
        * @example 32 to Zacatecas
        */
        public static function stateNumber()
        {
              return static::randomElement(array_keys(static::$state));
        }

        public static function stateNameByNumber($stateNumber)
        {
              return static::$state[$stateNumber];
        }

        /**
         * @example 'Nro 3'
         */
        public static function secondaryAddress()
        {
            return static::numerify(static::randomElement(static::$secondaryAddressFormats));
        }

        public static function postcodeByStateNumber($stateNumber){
            $postcodesRange=isset(self::$postcodeRangesByState[$stateNumber]) ? self::$postcodeRangesByState[$stateNumber] : $array();
            $ranges= explode('-', $postcodesRange);
            $zipcodeBegin= count($ranges) == 1 ? $ranges[0] : self::numberBetween($ranges[0], $ranges[1]) ;
            $format = str_pad($zipcodeBegin, 2, "0", STR_PAD_LEFT)."###";
            return static::numerify($format);

        }
}
?>
