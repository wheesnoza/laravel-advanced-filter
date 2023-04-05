<?php

namespace App\ViewModels;

use Illuminate\Contracts\Support\Arrayable;
use Reflection;
use ReflectionClass;
use ReflectionMethod;
use Illuminate\Support\Str;

class ViewModel implements Arrayable
{
    protected array $reserved = [];

    public function toArray()
    {
        return collect((new ReflectionClass($this))->getMethods())
            ->reject(fn (ReflectionMethod $method) => in_array($method->name, [...$this->reserved, '__construct', '__invoke', 'toArray']))
            ->filter(fn (ReflectionMethod $method) => in_array('public', Reflection::getModifierNames($method->getModifiers())))
            ->mapWithKeys(fn (ReflectionMethod $method) => [Str::snake($method->getName()) => $this->{$method->getName()}()])
            ->toArray();
    }
}
