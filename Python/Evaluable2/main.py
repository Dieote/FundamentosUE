from actividad import ClaseColectiva, SesionPersonal
from excepciones import ReservaInvalidaError, SinPlazasError
from reservas import Reserva
from usuario import Cliente, Entrenador


def main():
    print("=== Sistema FITLIFE CENTER ===")
    
    #crear cliente
    cliente1 = Cliente("Juan Pérez", "juan.perez@mail.com")
    cliente2 = Cliente("María Gómez", "maria.gomez@mail.com")
    
    print(f"- Cliente creado: {cliente1.nombre}, {cliente1.email}")
    print(f"- Cliente creado: {cliente2.nombre}, {cliente2.email}")
    
    # Crear entrenador
    entrenador1 = Entrenador("Laura Gómez", "laura@correo.com", "Yoga")
    
    print(f"- Entrenador: {entrenador1.nombre} ({entrenador1.especialidad})")
    
    #actividades
    print("\n=== Actividades ===")
    yoga = ClaseColectiva("Yoga", 15.0, 10)
    pilates = ClaseColectiva("Pilates", 20.0, 8)
    personal = SesionPersonal("Entrenamiento Personal", 50.0, 5, 20)
    
    print(f"- {yoga.nombre}: ${yoga.calcular_precio()} (Plazas disponibles: {yoga.plazas_disponibles})")
    print(f"- {pilates.nombre}: ${pilates.calcular_precio()} (Plazas disponibles: {pilates.plazas_disponibles})")
    print(f"- {personal.nombre}: ${personal.calcular_precio()} (Plazas disponibles: {personal.plazas_disponibles})")
    
    print("\nProbando plazas...")
    print("Hay plazas en Yoga:", yoga.hay_lugar())

    yoga.reservar_plaza()
    yoga.reservar_plaza()

    print("Plazas ocupadas en Yoga:", yoga.plazas_ocupadas)
    
    print("\n=== RESERVAS ===")

    reserva1 = Reserva(cliente1, yoga)
    reserva2 = Reserva(cliente1, personal)
    reserva3 = Reserva(cliente2, yoga)

    print(f"\nReservas de {cliente1.nombre}:")
    cliente1.ver_reservas()

    print(f"\nReservas de {cliente2.nombre}:")
    cliente2.ver_reservas()

    print("\nEstado de Yoga:")
    print(f"Plazas ocupadas: {yoga.plazas_ocupadas}/{yoga.plazas_max}")
    
    print("\n=== PRUEBA DE RESERVAS CON ERRORES ===")

    try:
        for i in range(12):  # forzamos el error
            Reserva(cliente1, yoga)

    except SinPlazasError as e:
        print("ERROR:", e)

    except ReservaInvalidaError as e:
        print("ERROR DE RESERVA:", e)

    except Exception as e:
        print("ERROR GENERAL:", e)

    else:
        print("Reservas realizadas correctamente.")

    finally:
        print("Fin de la prueba de reservas.")
    
    
if __name__ == "__main__":
    main()