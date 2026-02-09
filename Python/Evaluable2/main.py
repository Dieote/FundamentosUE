from usuario import Cliente, Entrenador


def main():
    print("=== Sistema FITLIFE CENTER ===")
    
#crear cliente
    cliente1 = Cliente("Juan Pérez", "juan.perez@mail.com")
    cliente2 = Cliente("María Gómez", "maria.gomez@mail.com")
    
    print(f"Cliente creado: {cliente1.nombre}, {cliente1.email}")
    print(f"Cliente creado: {cliente2.nombre}, {cliente2.email}")
    
    # Crear entrenador
    entrenador1 = Entrenador("Laura Gómez", "laura@correo.com", "Yoga")
    
    print(f"- {entrenador1.nombre} ({entrenador1.especialidad})")
    
    
if __name__ == "__main__":
    main()