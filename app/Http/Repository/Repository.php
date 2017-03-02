<?php
/**
 * Created by PhpStorm.
 * User: Miko
 * Date: 2017/2/28
 * Time: 16:31
 */
namespace App\Http\Repository;
use Illuminate\Support\Facades\Config;
use Cache;
use Closure;

abstract class Repository
{
    private $getCache;
    protected $cacheTime;
    protected $p_tag;

    public abstract function tag();

    protected function getCache(){
        if($this->getCache == null){
            $this->setTime(Config::get('cache.cache_time'));
            $this->setTag($this->tag());
            $this->getCache = cache();
        }
        return $this->getCache;
    }

    public function remember($key,Closure $entity){
        return $this->getCache()->tags($this->p_tag)->remember($key,$this->cacheTime,$entity);
    }

    public function forget($key){
        $this->getCache()->tags($this->p_tag)->forget($key);
    }

    public function clear(){
        $this->getCache()->tags($this->p_tag)->flush();
    }


    protected function setTag($tag){
        $this->p_tag = $tag;
    }

    public function setTime($min){
        $this->cacheTime = $min;
    }

}