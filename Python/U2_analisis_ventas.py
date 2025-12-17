#filtrar ventas
def filtrarVentasValidas(ventas):
    ventas_validas = []
    for venta in ventas:
        if isinstance(venta, (int, float)) and venta >= 0:
            ventas_validas.append(venta)
    return ventas_validas

#total ventas
def totalVentas(ventas):
    total = 0
    for venta in ventas:
        total += venta
    return total

#media ventas
def mediaVentas(ventas):
    if len(ventas) == 0:
        return None
    return totalVentas(ventas) / len(ventas)

#extremo ventas
def extremoVentas(ventas):
    if len(ventas) == 0:
        return (None, None)
    # maximo = max(ventas)
    maximo = ventas[0]
    # minimo = min(ventas)
    minimo = ventas[0]
    # for venta in ventas:
    for venta in ventas[1:]: #el primero ya lo usamos para inicializar
        if venta > maximo:
            maximo = venta
        if venta < minimo:
            minimo = venta
    return (maximo, minimo)

#clasificacion
def clasificarVentas(ventas, rangos):
    resultado = {categoria: [] for categoria in rangos}
    resultado['fuera de rango'] = []
    for venta in ventas:
        colocado = False
        for nombre, (min_val, max_val) in rangos.items():
            if min_val <= venta <= max_val:
                resultado[nombre].append(venta)
                colocado = True
                break
        if not colocado:
            resultado['fuera de rango'].append(venta)
    return resultado

#resumen
def resumenVentas(ventas):
    ventas_validas = filtrarVentasValidas(ventas)
    n = len(ventas_validas)
    media = mediaVentas(ventas_validas)
    maximo, minimo = extremoVentas(ventas_validas)
    return {
        'n': n,
        'media': media,
        'maximo': maximo,
        'minimo': minimo,
    }

#main
if __name__ == "__main__":
    ventas = [1250, 230, 'error', 180, 720, 300, None, 270, 850, 35, 65]

    print("Ventas originales:", ventas)

    validas = filtrarVentasValidas(ventas)
    print("Ventas válidas:", validas)

    #total_ventas = sum(ventas_validas)
    total = totalVentas(validas)
    print("Total de ventas válidas:", total)

    media = mediaVentas(validas)
    print("Media de ventas válidas:", media)

    maximo, minimo = extremoVentas(validas)
    print("Venta máxima válida:", maximo)
    print("Venta mínima válida:", minimo)

    rangos = {
        'bajas': (0, 50),
        'medias': (51, 200),
        'altas': (201, 500),
        'premium': (501, 1000)
    }

    clasificacion = clasificarVentas(validas, rangos)
    print("Clasificación de ventas por rangos:")
    for categoria, lista in clasificacion.items():
        print(f"  {categoria}: {lista}")

    resumen = resumenVentas(ventas)
    print("Resumen de ventas:", resumen)