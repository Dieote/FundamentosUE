from actividad import ClaseColectiva, SesionPersonal
from excepciones import ReservaDuplicadaError, SinPlazasError
from reservas import Reserva
from usuario import Cliente, Entrenador

def crear_actividades(entrenadores):
    return [
        ClaseColectiva("Yoga", 15, 10, entrenadores[0]),
        ClaseColectiva("Pilates", 14, 10, entrenadores[1]),
        ClaseColectiva("Zumba", 12, 15, entrenadores[2]),
        ClaseColectiva("Spinning", 13, 15, entrenadores[3]),
        ClaseColectiva("CrossFit", 18, 10, entrenadores[4]),
        ClaseColectiva("Step", 11, 15, entrenadores[5]),
        ClaseColectiva("Boxeo", 17, 10, entrenadores[7]),
        SesionPersonal("Masajes", 25, 5, entrenadores[6], 5),
        SesionPersonal("Personal Trainer", 40, 5, entrenadores[8], 10),
        SesionPersonal("Rehabilitación", 35, 5, entrenadores[9], 15),
    ]

def mostrar_actividades(actividades):
    print("\n=== Actividades Disponibles ===")
    for indice, actividad in enumerate(actividades):
        print(f"{indice + 1}. {actividad.nombre} | Precio: {actividad.calcular_precio()}€ - Plazas: {actividad.plazas_ocupadas}/{actividad.plazas_disponibles} - Entrenador: {actividad.entrenador.nombre} ({actividad.entrenador.especialidad})")

def mostrar_menu():
    print("""\n* Menú Principal *
    1. Ver actividades disponibles
    2. Hacer una reserva
    3. Ver mis reservas
    4. Eliminar una reserva
    0. Salir
    """)

def clientes_de_prueba(actividades):
    clientes = []
    
    #crear cliente
    cliente1 = Cliente("Juan Pérez", "juan.perez@mail.com")
    Reserva(cliente1, actividades[0])  # Yoga
    Reserva(cliente1, actividades[8])  # Personal Trainer
    
    cliente2 = Cliente("María Gómez", "maria.gomez@mail.com")
    Reserva(cliente2, actividades[2])  # zumba
    Reserva(cliente2, actividades[9])  # Rehabilitación
    Reserva(cliente2, actividades[0])  # Yoga

    
    cliente3 = Cliente("Antonio López", "antonio.lopez@mail.com")
    Reserva(cliente3, actividades[1])  # Pilates
    Reserva(cliente3, actividades[7])  # Masajes
    
    cliente4 = Cliente("Laura Martínez", "laura.martinez@mail.com")
    Reserva(cliente4, actividades[3])  # Spinning
    Reserva(cliente4, actividades[6])  # Boxeo
    
    cliente5 = Cliente("Diego Ruiz", "diego.ruiz@mail.com")
    Reserva(cliente5, actividades[4])  # CrossFit
    Reserva(cliente5, actividades[0])  # Yoga

    clientes.extend([cliente1, cliente2, cliente3, cliente4, cliente5])
    return clientes

def seleccionar_cliente(clientes):
    print("\n=== CLIENTES ===")
    for i, cliente in enumerate(clientes):
        print(f"{i+1}. {cliente.nombre} ({cliente.email})")
    print("0. Crear nuevo cliente")

    opcion = int(input("Selecciona cliente: "))
    if opcion == 0:
        nombre = input("Nombre: ")
        email = input("Email: ")
        nuevo = Cliente(nombre, email)
        clientes.append(nuevo)
        return nuevo
    return clientes[opcion - 1]
    
def main():
    print("=== MENU FIT-LIFE CENTER ===")
    
    # Entrenadores
    entrenadores = [
        Entrenador("Laura", "laura@mail.com", "Yoga"),
        Entrenador("Carlos", "carlos@mail.com", "Pilates"),
        Entrenador("Ana", "ana@mail.com", "Zumba"),
        Entrenador("Pedro", "pedro@mail.com", "Spinning"),
        Entrenador("Marta", "marta@mail.com", "CrossFit"),
        Entrenador("Luis", "luis@mail.com", "Step"),
        Entrenador("Jorge", "jorge@mail.com", "Boxeo"),
        Entrenador("Sofía", "sofia@mail.com", "Masajista"),
        Entrenador("David", "david@mail.com", "Personal"),
        Entrenador("Elena", "elena@mail.com", "Rehabilitación"),
    ]
    
    actividades = crear_actividades(entrenadores)
    clientes = clientes_de_prueba(actividades)    
    
    cliente = None  # Inicializar cliente del menu
    
    while True:
        mostrar_menu()
        opcion = input("Elige una opción: ")

        if opcion == "1":
            mostrar_actividades(actividades)

        elif opcion == "2":
            cliente = seleccionar_cliente(clientes)

            mostrar_actividades(actividades)
            try:
                indice = int(input("Número de actividad: ")) - 1
                Reserva(cliente, actividades[indice])
                print("Reserva realizada correctamente")
            except (ValueError, IndexError):
                print("Actividad no válida.")
            except SinPlazasError as e:
                print("ERROR:", e)
            except ReservaDuplicadaError as e:
                print("ADVERTENCIA:", e)

        elif opcion == "3":
            cliente.ver_reservas() if cliente else print("No hay cliente.")

        elif opcion == "4":
            if cliente:
                cliente.ver_reservas()
                try:
                    indice = int(input("Número de reserva a eliminar: ")) - 1
                    cliente.eliminar_reserva(indice)
                    print("Reserva eliminada")
                except Exception as e:
                    print("Error:", e)
            else:
                print("No hay reservas.")

        elif opcion == "0":
            print("¡Gracias por usar FitLife! Vuelve pronto...")
            break

        else:
            print("Opción no válida.")
            

    
if __name__ == "__main__":
    main()