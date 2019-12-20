<?php

namespace CConverter;

use CConverter\Calculate\Calculate;
use CConverter\Cache\Cache;

class Converter implements ConverterInterface
{
    /**
     * @var fixer.io api key string
     */
    protected $api_key;

    /**
     * sortage api key lenght 
     *
     * @var int
     */
    public $api_length = 32;

    /**
     * sortage cache or not 
     *
     * @var bool
     */
    public $isCache = false;

    /**
     * contains storage cache in minutes
     *
     * @var int
     */
    public $cacheTime = 60;

    /**
     * connect with API fixer.io
     *
     * @param  string $api_key
     * @return bool
     */
    public function __construct($api_key)
    {
        if(strlen($api_key)==$this->api_length){
            $this->api_key = $api_key;
        }else{
            throw new Exception\InvalidArgumentException('Invalid length of API KEY');
        }

        return true;
    }

    /**
     * initial currency conversion
     *
     * @param  string|array $from
     * @param  string|array $to
     * @param  float        $amount
     * @param  bool|int     $short
     * @return string|array
     */
    public function cconv($from, $to, $amount = 1, $short = false)
    {
        $getFrom = $this->checkInput($from);
        $getTo = $this->checkInput($to);

        $calculate = new Calculate($this->api_key);

        $output = $calculate->getValues($getFrom, $getTo, $amount, $short, $this->isCache, $this->cacheTime);

        return $output;
    }

    /**
     * validate input data
     *
     * @param  string $data
     * @return bool
     */
    public function validateInput($data)
    {
        if(strlen($data)==2 || strlen($data)==3){
            $output = ConverterCurrency::getCurrency($data);
        }else{
            $output = false;
        }
        return $output;
    }

    /**
     * initial cache or not
     *
     * @param  bool	 $is
     * @param  int	 $time
     * @return bool
     */
    public function cache($is = false, $time = 60)
    {
        $parm = Cache::setCache($is, $time);
        $this->isCache = $parm; 
        $this->cacheTime = $time;

        return true;
    }

    /**
     * check input data for validator
     *
     * @param  string|array	 $data
     * @return string|array
     * @throws Exception\InvalidArgumentException
     */
    protected function checkInput($data)
    {
        if(is_string($data)){
            $value = $this->validateInput($data);
            if($value===false) throw new Exception\InvalidArgumentException('Invalid data. Please enter a valid country or currency name');
        }else if(is_array($data)){
            $value = array();
            foreach($data as $single){
                $opt = $this->validateInput($single);
                if($opt===false) throw new Exception\InvalidArgumentException('Invalid data. Please enter array with a valid country or currency names');
                array_push($value, $opt);
            }
        }else{
            throw new Exception\InvalidArgumentException('Invalid data. Please use string or array value');
        }
        return $value;
    }
}
