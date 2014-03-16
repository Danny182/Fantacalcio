/*
 * Class.cpp
 *
 *  Created on: 12/mar/2014
 *      Author: Barloccia
 */

#include <iostream>
#include "Class.h"



void Person::setName(std::string name){
	this->name = name;
}

std::string Person::getName(){
	return name;
}

void Person::setSurname(std::string surname){
	this->surname = surname;
}


std::string Person::getSurname(){
	return surname;
}

void Person::setAge(int age){
	this->age = age;
}

int Person::getAge(){
	return age;
}

void Person::createSalute(){
/*
	std::cout << "Hello ";
	Person hello;
	std::string name = hello.getName();
	std::string surname = hello.getSurname();
	int age = hello.getAge();
	std::cout << name << surname;
	std::cout << std::endl;
	std::cout << "etˆ:" << age;
*/
	std::cout << "Hello ";
	std::cout << name;
	std::cout << " ";
	std::cout << surname;
	std::cout << std::endl;
	std::cout << "etˆ:" << age;





}







