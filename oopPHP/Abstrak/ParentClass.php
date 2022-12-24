<?php
namespace Parent;

abstract class ParentClass
{
    // Abstract method with an argument
    abstract protected function prefixName(string $name, string $gender): string;
}

class ChildClass extends ParentClass
{
    final public function prefixName($name, $gender): string
    {
        if (!empty($name) && $gender == "male") {
            $prefix = "Mr.";
        } elseif (!empty($name) && $gender == "female") {
            $prefix = "Mrs.";
        } else {
            $prefix = "WRONG";
        }
        return "\r\n$prefix $name";
    }
}


