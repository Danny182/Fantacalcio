/*
 * exe.cpp
 *
 *  Created on: 12/mar/2014
 *      Author: Barloccia
 */

#include "Class.h"
#include <iostream>

int main()
{
	Person prova;
	std::string name = "Gabriele";
	std::string surname = "Barlacchi";
	int age = 19;
	//setto i parametri
	prova.setName(name);
	prova.setSurname(surname);
	prova.setAge(age);

	prova.createSalute();






}


