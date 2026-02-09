from actividad import ClaseColectiva, SesionPersonal
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
    
    
if __name__ == "__main__":
    main()