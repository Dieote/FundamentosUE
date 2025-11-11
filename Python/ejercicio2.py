# ============================================
# Práctica Unidad 2 – Estructuras de control y datos
# Programa: Gestor de notas de alumnos
# ============================================

print("=== GESTOR DE NOTAS ===")

# Creamos la lista principal para guardar la información de los alumnos
alumnos = []

# Bucle principal para introducir los alumnos
while True:
    nombre = input("Introduce el nombre del alumno (escribe salida para finalizar): ")
    if nombre == "salida":  # Si se escribe "salida", termina el bucle
        break

    # Lista de notas del alumno actual
    notas = []
    while True:
        nota = input("Introduce una nota (escribe salida para finalizar): ")
        if nota == "salida":
            break
        try:
            # Convertimos la nota a número decimal
            notas.append(float(nota))
        except ValueError:
            print("⚠️ Por favor, introduce un número válido.")

    # Guardamos el alumno como diccionario
    alumno = {"nombre": nombre, "notas": notas}
    alumnos.append(alumno)

# Mostrar resultados finales
print("\n=== RESULTADOS ===")
for alumno in alumnos:
    if len(alumno["notas"]) > 0:
        media = sum(alumno["notas"]) / len(alumno["notas"])
    else:
        media = 0

    if media >= 5:
        estado = "APROBADO"
    else:
        estado = "SUSPENSO"

    print(f"{alumno['nombre']}: media = {media:.2f} -> {estado}")

# Mensaje final
print("\n--- Fin del programa ---")
print(f"Se han procesado {len(alumnos)} alumnos.")
