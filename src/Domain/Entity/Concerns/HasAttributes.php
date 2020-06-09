<?php

declare(strict_types=1);

namespace Ddd\Domain\Entity\Concerns;

use Illuminate\Support\Str;

trait HasAttributes
{   
    /**
     * Fill the entity data
     *
     * @param array $data
     * @return void
     */
    public function fill(array $data)
    {
        foreach ( $this->attributes as $key ){    
            $setter = $this->getAccessor($key, 'set');

            if ($setter){
                isset($data[$key]) && $this->$setter($data[$key]);
            }else{
                $this->$key = isset($data[$key]) ?$data[$key] :null;
            }
        }
    }

    /**
     * Return an array representation of the object
     *
     * @return array
     */
    public function getArrayCopy()
    {
        foreach ( $this->attributes as $key ){
            $getter = $this->getAccessor($key, 'get');
            $value = !$getter ?$this->$key :$this->$getter();
            
            if (isset($value)){
                $data[$key] = $value;
            }
        }
        
        return $data;
    }

    /**
     * Get a accessor method if defined
     *
     * @param string $attribute
     * @return string|null
     */
    protected function getAccessor(string $property, string $type) : ?string
    {
        $method = Str::camel("{$type}_{$property}");
        return \method_exists($this, $method) ?$method :null;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        return $this->getArrayCopy();
    }
}