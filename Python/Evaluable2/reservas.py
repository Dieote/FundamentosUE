class Reserva:
    def __init__(self, cliente, actividad):
        # Guardamos referencias
        self._cliente = cliente
        self._actividad = actividad

        # reservamos plaza y si no hay lanza excepcion
        self._actividad.reservar_plaza()

        # Calculamos precio automático de claseColectica o personal+recargo
        self._precio_final = self._actividad.calcular_precio()

        #  reserva del cliente
        self._cliente.agregar_reserva(self)

    @property
    def cliente(self):
        return self._cliente

    @property
    def actividad(self):
        return self._actividad

    @property
    def precio_final(self):
        return self._precio_final

    def mostrar(self):
        print(
            f"Actividad: {self._actividad.nombre} | "
            f"Precio: {self._precio_final}€ | "
            f"Plazas ocupadas: {self._actividad.plazas_ocupadas}/{self._actividad.plazas_max}"
        )

    def __str__(self):
        return f"{self._actividad.nombre} - {self._precio_final}€"
