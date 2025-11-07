"""
Ejercicio 1: Operaciones aritméticas y sentencias de control básicas
✍️ Enunciado del ejercicio:
Se desea realizar un programa que trabaje con tres números enteros introducidos por el usuario.
El programa debe:
1. Solicitar al usuario tres números enteros (num1, num2, num3).
2. Mostrar los números introducidos, indicando su tipo de dato (int).
3. Calcular y mostrar:
o El mayor y el menor.
o La suma de los tres números.
o La resta secuencial (num1 - num2 - num3).
o El producto (num1 * num2 * num3).
o El cociente real de dividir la suma entre 3 (/).
o La división entera (//) de la suma entre 3.
o El resto (%) de la suma entre 3.
o La potencia del mayor elevado al menor.
4. Convertir la media aritmética a entero (con int) y mostrarla.
5. Convertir la suma a cadena de texto y mostrar el mensaje: "La suma como texto es: <valor>".
6. Indicar si la suma es par o impar.
7. Mostrar si la media real es mayor, menor o igual a 10.
⚠️ Restricciones:
• No usar bucles ni listas.
• Solo trabajar con variables simples y if, elif, else.
"""

# Solicitar al usuario tres números enteros
num1 = int(input("Introduce el primer número entero: "))
num2 = int(input("Introduce el segundo número entero: "))   
num3 = int(input("Introduce el tercer número entero: "))

# Mostrar los números introducidos y su tipo de dato
print(f"Números introducidos: {num1} (tipo: {type(num1)}) | {num2} (tipo: {type(num2)}) | {num3} (tipo: {type(num3)})")

# Calcular mayor y menor
mayor = max(num1, num2, num3)
menor = min(num1, num2, num3)
print(f"Nº Mayor: {mayor}, Nº Menor: {menor}")

# Calcular suma, resta, producto
suma = num1 + num2 + num3
resta = num1 - num2 - num3
multiplicación = num1 * num2 * num3
print(f"Suma: {suma}, Resta: {resta}, Producto: {multiplicación}")

# Calcular cociente real, división entera, resto, potencia
cociente_real = suma / 3
division_entera = suma // 3
modulo = suma % 3
potencia = mayor ** menor
print(f"Cociente real: {cociente_real}, División entera: {division_entera}, Resto: {modulo}, Potencia (mayor^menor): {potencia}")

# Mostrar media aritmética a entero
print(f"Media aritmética (entero): {int(cociente_real)}")

# Convertir a cadena de texto y mostrar mensaje
suma_texto = str(suma)
print(f"La suma como texto es: {suma_texto}")

# Indicar si la suma es par o impar
if suma % 2 == 0:   
    print("La suma es par.")
else:
    print("La suma es impar.")

# Mostrar si la media real es mayor, menor o igual a 10
if cociente_real > 10:
    print("La media real es mayor que 10.")
elif cociente_real < 10:
    print("La media real es menor que 10.")
else:
    print("La media real es igual a 10.")   