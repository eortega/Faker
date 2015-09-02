<?php
namespace Faker\Provider\es_MX;

class PhoneNumber extends \Faker\Provider\PhoneNumber
{
    protected static $formats = array(
        '+52 {{areaCode}}# ## ####',
        '+52 {{areaCode}}# #######',
        '+52 {{areaCode}}########',
        '+52{{areaCode}}########',
        '{{areaCode}} ### #####',
        '{{areaCode}}# #######',
        '{{areaCode}}########',
        '{{areaCode}}#-##-####',
        '{{areaCode}}#-######',
    );

    /**
     * An array of es_MX simple format phone
     * @var array
     */
    protected static $simpleFormat = array(
        '{{areaCode}}########',
        '492#######'
    );

    /**
     * An array of es_MX most importants cities ladas
     * @var array
     */
    protected static $areaCodes = array(
        '55', '81', '33'
    );

    /**
     * Return a es_MX lada area code
     * @return string
     */
    public static function areaCode()
    {
        return static::numerify(static::randomElement(static::$areaCodes));
    }

    /**
     * Return a es_MX simple format to web forms pourpose
     * @return string
     */
    public function tollSimpleFormat()
    {
        $format = $this->generator->parse(static::randomElement(static::$simpleFormat));
        return static::numerify($format);
    }
}
