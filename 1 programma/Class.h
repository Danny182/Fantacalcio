/*
 * Person.h
 *
 *  Created on: 11/mar/2014
 *      Author: Barloccia
 */

#ifndef PERSON_H_
#define PERSON_H_
#include<iostream>



class Person{

private:
	std::string name;
	std::string surname;
	int age;

public:
	void setName(std::string name);
	std::string getName();
	void setSurname(std::string surname);
	std::string getSurname();
	void setAge(int age);
	int getAge();
	void createSalute();
};



#endif /* PERSON_H_ */
