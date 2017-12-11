<?php

// model with relationship
class City {
  public function people () {
    return $this->belongsToMany(Person::class, 'pivot_table');
  }
}

class People {

  public function city () {
    return $this->belongsToMany(City::class, 'pivot_table');
  }
}


// dependency injection. Here we inject Request class object to the store function

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