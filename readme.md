# service container and dependency injection 
some function might depend on some other function in this case we can inject dependancy to this function usign type hinting 

~~~php
class PageController {
  public function store (Request $request) {
    $name = $request('name');
    $email = $request('email');
    Person::create([
      'name' => $name,
      'email' => $email
    ]);
  }
}
~~~

Here `$request` is instantiation of `Request` class. Which injected 

# facade  

Simple interface for complex code. Like in routing we are using `Route` facade. 

## One to many relationship

A "one-to-many" relationship is used to define relationships where a single model owns any amount of other models. for example, city has many people and people belongs to city, inverse. 

~~~php
class City {

  public function people () {
    return $this->hasMany(Person::class);
  }
}
~~~

Inverse relationship

~~~php
class Person {

  public function city () {
    return $this->belongsTo(City::class);
  }
}
~~~

##  many to many relationship
City has many people. single people might stay in different city. I mean people has many city. In this case we need anthoer table to track which city has which people. This relationship table known as `pivot` table. 

~~~php
class City {
  public function people () {
    return $this->belongsToMany(Person::class, 'pivot_table');
  }
}
~~~


Inverse relationship


~~~php

class People {

  public function city () {
    return $this->belongsToMany(City::class, 'pivot_table');
  }
}
~~~



