// Definir una función que reciba dos números y retorne el primer número elevado a la
// potencia del segundo. Por ejemplo, miFuncion(5,2) = 5
// 2 = 25.


function cuenta(param1, param2){
  return Math.pow(param1, param2);
}

cuenta(5,2);


// Crear una variable llamada cuadrado que tenga asignada una función anónima que
// reciba un número y retorne el cuadrado de ese ńumero

var cuadrado = function(numero){
  return numero * numero;
}

cuadrado(2);

// Definir una función llamada trianguloRectangulo, que reciba dos números con el
// valor de sus lados (a y b), y retorne la suma del perímetro total (a+b+hipotenusa).
// Recordá la siguiente fórmula:

function trianguloRectangulo(num1, num2){

  function hipotenusa(num1, num2){
    return (num1 * num1 + num2 * num2);
  }
  return (num1 + num2 + hipotenusa(num1, num2));
}

trianguloRectangulo(3,4);


// Definir una función miSandwich que reciba 3 parámetros, los primeros dos son
// ingredientes y el tercero es una función callback. La función miSandwich, deberá
// imprimir por consola "estoy comiendo un sandwich de:" con los ingredientes
// pasados. Utilizar la función callback en esa función para imprimir en consola
// "Terminé de comer mi sandwich." Finalmente ejecutar la función miSandwich y
// pasarle valores.


 function imprimir(){
   console.log("Terminé de comer mi sandwich.");
 }

 function miSandwich(param1, param2, cb){
   console.log('Estoy comiento un sandwich de ' + param1 + ' y ' + param2);
   cb();
 }

miSandwich('jamon', 'queso', imprimir);


// Definir un array de números del 1 al 20. Utilizando el método forEach, imprimir en
// consola solo aquellos que sean múltiplos de 7.

var arr = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20];

function multiplo(array){
arr.forEach(function(value, index){
  if(value%7 === 0){
    console.log(value);
  }
});

};


multiplo(arr);

// Utilizando el array del ejercicio 1 implementar la función map de tal forma de obtener
// un arrayResultado con la raíz cuadrada de c/u de los números. Utilizar la función
// Math.sqrt para esto.

var arrayResultado = arr.map(function(index, value){
  return Math.sqtr(value, 2);
})


console.log(arrayResultado);


// Un detective recibió un código anónimo cuyo mensaje quiere descifrar. Acudió a vos
// por ayuda; las únicas pistas que recibió fueron: filter y typeof. ¿Podrás ayudarlo?




var enigma = ['l', 1, 'a', 2, 2, 5, 'p', 5, 7, 5, 3, 'e', 6, 'r', 7, 6, 5, 3, 2,
1, 's', 9, 9, 9, 6, 'e', 2, 'v', 5, 'e', 3, 'r', 2, 'a', 1, 6, 4, 1, 2, 'n', 2,
'c', 3, 5, 5, 5, 7, 'i', 4, 'a', 5, 2, 1, 3, 'e', 6, 's', 7, 'l', 4, 'a', 3, 'c',
2, 3, 1, 5, 3, 2, 'l', 3, 'a', 4, 'v', 5, 'e', 6];

var result;
function descifrar(array){
  
  result = array.filter(function(elem){
    return typeof elem === 'number';
  });

}

descifrar(enigma);

// console.log(result);


// Con toda esta información el detective logró averiguar la dirección de una calle, sólo
// que no encuentra la altura. Lo único para descifrar que encontró fué una leyenda
// que dice: “Sumar todos los números del enigma planteado para encontrar la altura”.
// Encontró una pista que decía reduce.

var resultNumero = result.reduce(function(anterior, actual){
  return anterior + actual;
});


console.log(resultNumero);



// Objeto literal
// 1. Crear un objeto llamado persona, que tenga las siguientes propiedades con valores
// predefinidos.
// a. edad (number)
// b. nombre (string)
// c. apellido (string)
// d. sexo (string)
// e. estado civil (string)
// f. películas favoritas (array de strings)
// 2. Imprimir por consola utilizando console log, todas las propiedades de persona.
// 3. Cambiarle la edad para simular que cumplió años.
// 4. Agregar una propiedad a persona llamada estatura con algún dato predefinido.
// 5. Agregar un método a persona llamado saludo(), que imprime por consola, el nombre
// y apellido de la persona.
// 6. Ejecutar: persona.saludo().
// 7. Agregar un método a persona llamada comer(), que reciba un parámetro comida, y
// que muestre en consola “estoy comiendo:” y luego el nombre de la comida.
// 8. Finalmente ejecutar el código persona.comer("fideos")

var persona = {
  edad: 31,
  nombre: 'santi',
  apellido: 'nun',
  sexo: 'm',
  estadoCivil: 'soltero',
  peliculas: ['sadsa', 'asdsad', 'asdasd'],
  saludo: function(){
    console.log(this.nombre);
  },
  comer: function(comida){
    console.log('estoy comiendo '+ comida);
  }
};


console.log(persona.edad);
persona.edad = 22;
console.log(persona.edad);

persona.estatura = 170;

console.log(persona.estatura);

persona.saludo();

persona.comer('hamburguesas');