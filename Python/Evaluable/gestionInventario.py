import os
#la ruta del archivo
ARCHIVO = os.path.join(os.path.dirname(os.path.abspath(__file__)), 'inventarioTienda.txt')

def cargarInventario(): 
    inventario = [] 
    if not os.path.exists(ARCHIVO): 
        # archivo no existe, crear inventario por defecto 
        inventarioInicial = [ 
            {'nombre': 'portatil samsung A9', 'precio': 49.99, 'cantidad': 4}, 
            {'nombre': 'portatil hp probook', 'precio': 749.50, 'cantidad': 3}, 
            {'nombre': 'telefono xiaomi redmi 12', 'precio': 199.99, 'cantidad': 12}, 
            {'nombre': 'portatil acer swift 3', 'precio': 599.00, 'cantidad': 6}, 
            {'nombre': 'telefono iphone 13', 'precio': 899.00, 'cantidad': 5}, 
            {'nombre': 'tablet samsung tab s6', 'precio': 329.00, 'cantidad': 7}, 
            {'nombre': 'tablet lenovo m10', 'precio': 179.99, 'cantidad': 8}, 
            {'nombre': 'auriculares sony wh1000xm4', 'precio': 249.99, 'cantidad': 2}, 
            {'nombre': 'auriculares xiaomi buds 3', 'precio': 59.99, 'cantidad': 10}, 
            {'nombre': 'monitor dell 24', 'precio': 129.99, 'cantidad': 4}, 
            {'nombre': 'monitor lg ultrawide', 'precio': 239.99, 'cantidad': 3}, 
            {'nombre': 'teclado logitech k120', 'precio': 19.99, 'cantidad': 15}, 
            {'nombre': 'raton logitech m185', 'precio': 14.99, 'cantidad': 20}, 
            {'nombre': 'ssd samsung 1tb', 'precio': 99.99, 'cantidad': 9}, 
            {'nombre': 'hdd seagate 2tb', 'precio': 59.99, 'cantidad': 6}, 
            {'nombre': 'ram corsair 16gb', 'precio': 74.99, 'cantidad': 5}, 
            {'nombre': 'placa asus b550', 'precio': 149.99, 'cantidad': 2}, 
            {'nombre': 'grafica nvidia rtx 3060', 'precio': 329.99, 'cantidad': 1}, 
            {'nombre': 'fuente corsair 650w', 'precio': 89.99, 'cantidad': 7}, 
            {'nombre': 'cargador usb-c 65w', 'precio': 24.99, 'cantidad': 25}, 
        ] 
        guardarInventario(inventarioInicial) 
        return inventarioInicial 
    with open(ARCHIVO, 'r') as file: 
        for linea in file: 
            partes = linea.strip().split(';') 
            if len(partes) == 3: 
                nombre, precio, cantidad = partes 
                inventario.append({ 
                    "nombre": nombre, 
                    "precio": float(precio), 
                    "cantidad": int(cantidad) 
                }) 
    return inventario 

def guardarInventario(inventario): 
    with open(ARCHIVO, 'w') as file: 
        for producto in inventario: 
            linea = f"{producto['nombre']};{producto['precio']};{producto['cantidad']}\n" 
            file.write(linea) 

def mostrarInventario(inventario): 
    print("\n--- Inventario de la tienda ---") 
    for producto in inventario: 
        print(f"{producto['nombre']:12} | Precio: {producto['precio']} € | Cantidad: {producto['cantidad']}") 
    print("-------------------------------") 

def valorTotalInventario(inventario): 
    total = 0.0 
    for producto in inventario: 
        total += producto['precio'] * producto['cantidad'] 
    return total 

def listaDeAgotados(inventario): 
    agotado = [producto for producto in inventario if producto['cantidad'] == 0] 
    return agotado 

def actualizarCantidad(inventario): 
    nombreProducto = input("Ingrese el nombre del producto a actualizar: ") 
    for producto in inventario: 
        if producto["nombre"].lower() == nombreProducto.lower(): 
            print(f"Cantidad actual: {producto['cantidad']}") 
            try: 
                nueva_cantidad = int(input("Nueva cantidad: ")) 
                producto["cantidad"] = nueva_cantidad 
                guardarInventario(inventario) 
                print("Cantidad actualizada correctamente.") 
            except ValueError: 
                print("Error: debes introducir un número entero.") 
            return 
    print("Producto no encontrado.") 

#Interfaz 
def menuGestionInventario(): 
    inventario = cargarInventario() 
    while True: 
        print("\n--- Menú de Gestión de Inventario ---") 
        print("1. Mostrar inventario") 
        print("2. Calcular valor total del inventario") 
        print("3. Listar productos agotados") 
        print("4. Actualizar cantidad de un producto") 
        print("5. Guardar y salir") 
        opcion = input("Seleccione una opción (1-5): ") 
        if opcion == '1': 
            mostrarInventario(inventario) 
        elif opcion == '2': 
            total = valorTotalInventario(inventario) 
            print(f"Valor total del inventario: ${total:.2f} €") 
        elif opcion == '3': 
            agotados = listaDeAgotados(inventario) 
            if len(agotados) == 0: 
                print("No hay productos agotados.") 
            else: 
                print(" - Productos agotados:") 
                for item in agotados: 
                    print(f"- {item['nombre']}") 
        elif opcion == '4': 
            actualizarCantidad(inventario) 
        elif opcion == '5': 
            guardarInventario(inventario) 
            print("Inventario guardado. Saliendo del programa.") 
            break 
        else: 
            print("Opción inválida. Por favor, seleccione una opción del 1 al 5.") 

#sin esto no se ejecuta el menu 
if __name__ == '__main__': 
    menuGestionInventario()