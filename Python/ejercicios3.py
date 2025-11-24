# Práctica Unidad 2 – Estructuras de control y datos
# Programa: inventario de tienda
# ============================================

print("Bienvenido al sistema de inventario de tu tienda")

inventario = {}

while True:
    nombre = input("Introduce el nombre del producto (o pulsa Enter para terminar): ")
    if nombre == "":  # si no se escribe nada, se termina el bucle
        break

    while True:
        cantidad_input = input("Cantidad en stock: ")
        try:
            cantidad = int(cantidad_input)
            if cantidad < 0:
                print("La cantidad no puede ser negativa.")
                continue
            break
        except ValueError:
            print("Introduce un número entero válido para la cantidad.")          
    while True:
        precio_input = input("Precio por unidad (€): ")
        try:
            precio = float(precio_input)
            if precio < 0:
                print("El precio no puede ser negativo.")
                continue
            break
        except ValueError:
            print("Introduce un número válido para el precio.")

# Crear diccionario con los datos del producto
    producto = {
        "nombre": nombre,
        "cantidad": cantidad,
        "precio": precio
    }

# Guardar el producto usando el nombre como clave
    # Si esta repetido se sobrescribirá
    inventario[nombre] = producto
# Mostrar resultados
print("\n=== LISTADO DE INVENTARIO ===")
valor_total = 0 #acumular el total del inventario

for producto in inventario.values():
    valor_producto = producto["cantidad"] * producto["precio"]
    valor_total += valor_producto
    print(f"{producto['nombre']}: {producto['cantidad']} unidades x {producto['precio']} € = {valor_producto:.2f} €")

print(f"\nValor total del inventario: {valor_total:.2f} €")
print("--- Fin del programa ---")