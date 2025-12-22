# ======================================================
# 1. Validación de un jugador
# ======================================================
def validar_jugador(j):
    """
    Comprueba si un jugador tiene datos válidos.
    Validamos:
    - nivel >= 1
    - puntuación >= 0
    - tiempo > 0
    - precisión entre 0 y 100
    - enemigos >= 0
    """
    if not isinstance(j, dict):
        return False
    claves = ["nombre", "nivel", "puntuacion", "tiempo", "precision", "enemigos"]
# Comprobamos que existan todas las claves
    for c in claves:
        if c not in j:
            return False
# Comprobaciones numéricas
    if not isinstance(j["nivel"], int) or j["nivel"] < 1:
        return False
    if not isinstance(j["puntuacion"], (int, float)) or j["puntuacion"] < 0:
        return False
    if not isinstance(j["tiempo"], (int, float)) or j["tiempo"] <= 0:
        return False
    if not (isinstance(j["precision"], (float, int)) and 0 <= j["precision"] <= 100):
        return False
    if not isinstance(j["enemigos"], int) or j["enemigos"] < 0:
        return False
    return True

# ======================================================
# 2. Separar jugadores válidos de inválidos
# ======================================================
def filtrar_jugadores(jugadores):
    """
Devuelve dos listas:
- jugadores válidos
- jugadores inválidos
"""
    validos = []
    invalidos = []
    for j in jugadores:
        if validar_jugador(j):
            validos.append(j)
        else:
            invalidos.append(j)
    return validos, invalidos
# ======================================================
# 3. Estadísticas generales
# ======================================================
def estadisticas_generales(jugadores):
    """
Calcula estadísticas globales:
- puntuación media
- precisión media
- nivel máximo
- tiempo total
"""
    if len(jugadores) == 0:
        return {}
    suma_puntuacion = 0
    suma_precision = 0
    tiempo_total = 0
    nivel_maximo = jugadores[0]["nivel"]
    
    for j in jugadores:
        suma_puntuacion += j["puntuacion"]
        suma_precision += j["precision"]
        suma_precision += j["precision"]
        tiempo_total += j["tiempo"]
        if j["nivel"] > nivel_maximo:
            nivel_maximo = j["nivel"]
    media_puntuacion = suma_puntuacion / len(jugadores)
    media_precision = suma_precision / len(jugadores)
    
    return {
        "media_puntuacion": media_puntuacion,
        "media_precision": media_precision,
        "nivel_maximo": nivel_maximo,
        "tiempo_total": tiempo_total
    }
# ======================================================
# 4. Clasificación por habilidad
# ======================================================
def clasificar_habilidad(j):
    """
Clasifica a un jugador según su nivel:
"""
    nivel = j["nivel"]
    if nivel <= 5:
        return "novato"
    elif nivel <= 15:
        return "intermedio"
    elif nivel <= 30:
        return "avanzado"
    else:
        return "experto"
    return "experto"

def clasificar_todos(jugadores):
    """
Devuelve un diccionario con listas de jugadores por categoría.
"""
    categorias = {"novato": [], "intermedio": [], "avanzado": [], "experto": []}
    for j in jugadores:
        cat = clasificar_habilidad(j)
        categorias[cat].append(j)
    return categorias

# ======================================================
# 5. Detección de tramposos
# ======================================================

def es_tramposo(j):
    """
Regla básica para detectar trampas:
- precisión > 95% y enemigos < 10
- puntuación demasiado alta para su nivel
- tiempo muy bajo con puntuaciones enormes
"""
    if j["precision"] > 95 and j["enemigos"] < 10:
        return True
    if j["puntuacion"] > j["nivel"] * 20000:
        return True
    if j["tiempo"] < 5 and j["puntuacion"] > 50000:
        return True
    return False

def detectar_tramposos(jugadores):
    """
Devuelve una lista con jugadores sospechosos.
"""
    return [j for j in jugadores if es_tramposo(j)]

# ======================================================
# 6. Generación de informe final
# ======================================================

def generar_informe(jugadores):
    validos, invalidos = filtrar_jugadores(jugadores)
    stats = estadisticas_generales(validos)
    clasificados = clasificar_todos(validos)
    tramposos = detectar_tramposos(validos)
    return {
"validos": validos,
"invalidos": invalidos,
"estadisticas": stats,
"clasificacion": clasificados,
"tramposos": tramposos
}
    
# ======================================================
# 7. Mostrar informe
# ======================================================

def mostrar_informe(informe):
    print("===== INFORME DE JUGADORES =====")
    print(f"Jugadores válidos: {len(informe['validos'])}")
    print(f"Jugadores inválidos: {len(informe['invalidos'])}")
    
    print("\n--- Estadísticas globales ---")
    for clave, valor in informe["estadisticas"].items():
        print(f"{clave}: {valor}")
    
    print("\n--- Clasificación por habilidad ---")
    for categoria, lista in informe["clasificacion"].items():
        print(f"{categoria.capitalize()}: {len(lista)} jugadores")

    print("\n--- Posibles tramposos ---")
    for j in informe["tramposos"]:
        print(f"- {j['nombre']}")
print("===============================")
        
# ======================================================
# 8. Función principal
# ======================================================
def ejecutar_sistema(jugadores):
    informe = generar_informe(jugadores)
    mostrar_informe(informe)
    return informe

# ======================================================
# 9. Ejecución del programa
# ======================================================

if __name__ == "__main__":
    jugadores = [
        {"nombre": "Player01", "nivel": 12, "puntuacion": 15320, "tiempo": 47.5, "precision": 37.2, "enemigos":
            123},
        {"nombre": "Player02", "nivel": 3, "puntuacion": 530, "tiempo": 12.1, "precision": 14.0, "enemigos": 12},
        {"nombre": "Player03", "nivel": 25, "puntuacion": 999999, "tiempo": 1.2, "precision": 99.9, "enemigos": 2},
        {"nombre": "Player04", "nivel": 8, "puntuacion": 8200, "tiempo": 41.0, "precision": 45.5, "enemigos": 98},
        {"nombre": "Player05", "nivel": -1, "puntuacion": 3000, "tiempo": 20.0, "precision": 50, "enemigos": 33},
    ]

ejecutar_sistema(jugadores)
