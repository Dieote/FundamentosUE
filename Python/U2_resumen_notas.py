def filtrar_validos(puntuaciones):
    """
    Devuelve una lista con solo los enteros (no bool) contenidos en puntuaciones.
    """
    validos = []
    for x in puntuaciones:
        if isinstance(x, int) and not isinstance(x, bool):
            validos.append(x)
    return validos

def media(lista):
    """
    Calcula la media aritmética de una lista de números.
    Lanza ValueError si la lista está vacía.
    """
    if len(lista) == 0:
        raise ValueError("La lista está vacía")
    suma = 0
    for v in lista:
        suma += v
    return suma / len(lista)

def max_min(lista):
    """
    Devuelve (maximo, minimo) de la lista.
    """
    if len(lista) == 0:
        raise ValueError("Lista vacía")

    def calcular_max(lst):
        mayor = lst[0]
        for v in lst[1:]:
            if v > mayor:
                mayor = v
        return mayor

    def calcular_min(lst):
        menor = lst[0]
        for v in lst[1:]:
            if v < menor:
                menor = v
        return menor

    return calcular_max(lista), calcular_min(lista)

rangos = {
    'aprobado': (5, 6),
    'notable': (7, 8)
}
{
  'aprobado': [5, 6],
  'notable': [7, 8],
  'fuera_rango': [...]
}

def clasificar_por_rango(puntuaciones, rangos):
    """
    Clasifica puntuaciones según rangos inclusivos.
    """
    resultado = {k: [] for k in rangos}
    resultado['fuera_rango'] = []

    for p in puntuaciones:
        colocado = False
        for nombre, (minv, maxv) in rangos.items():
            if minv <= p <= maxv:
                resultado[nombre].append(p)
                colocado = True
                break
        if not colocado:
            resultado['fuera_rango'].append(p)

    return resultado

def resumen_estadistico(puntuaciones):
    """
    Devuelve un resumen estadístico de la lista.
    """
    vals = filtrar_validos(puntuaciones)
    n = len(vals)

    if n == 0:
        return {'n': 0, 'media': None, 'max': None, 'min': None}

    try:
        m = media(vals)
    except ValueError:
        m = None

    try:
        mx, mn = max_min(vals)
    except ValueError:
        mx, mn = None, None

    return {'n': n, 'media': m, 'max': mx, 'min': mn}

if __name__ == "__main__":
    datos = [9, 'abc', 7, 10.0, None, 5, True, 8, -1, 10, 6, 3]

    print("Datos originales:", datos)

    validos = filtrar_validos(datos)
    print("Valores válidos:", validos)

    print("Resumen:", resumen_estadistico(validos))

    rangos = {
        'suspenso': (0, 4),
        'aprobado': (5, 6),
        'notable': (7, 8),
        'sobresaliente': (9, 10)
    }

    clasificacion = clasificar_por_rango(validos, rangos)
    print("Clasificación por rangos:")
    for k, v in clasificacion.items():
        print(f" {k}: {v}")
