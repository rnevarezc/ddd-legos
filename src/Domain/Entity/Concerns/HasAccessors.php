<?php

declare(strict_types=1);

namespace Ddd\Domain\Entity\Concerns;

/**
 * Accessors Trait
 * 
 * The trait below however, dynamically sets and gets instance 
 * properties based on the common place method naming pattern. 
 * 
 * @author Edd Mann
 * @see https://eddmann.com/posts/accessors-getter-setter-and-singleton-traits-in-php/
 */
trait HasAccessors
{   
    public function __call($method, $args)
    {
        if ( ! preg_match('/(?P<accessor>set|get)(?P<property>[A-Z][a-zA-Z0-9]*)/', $method, $match) ||
             ! property_exists(__CLASS__, $match['property'] = lcfirst($match['property']))
        ) {
            throw new \BadMethodCallException(sprintf(
                "'%s' does not exist in '%s'.", $method, get_class(__CLASS__)
            ));
        }

        switch ($match['accessor']) {
            case 'get':
                return $this->{$match['property']};
            case 'set':
                if ( ! $args) {
                    throw new \InvalidArgumentException(sprintf(
                        "'%s' requires an argument value.", $method)
                    );
                }
                $this->{$match['property']} = $args[0];
                return $this;
        }
    }
}