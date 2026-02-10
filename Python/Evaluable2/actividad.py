from abc import ABC, abstractmethod

from excepciones import SinPlazasError

class Actividad(ABC):
    def __init__(self, nombre, precio_base, plazas_disponibles):
        self.nombre = nombre
        self.precio_base = precio_base
        self.plazas_max = plazas_disponibles
        self._plazas_ocupadas = 0

    # -------- propiedades --------
    @property
    def nombre(self):
        return self._nombre

    @nombre.setter
    def nombre(self, valor):
        if not valor:
            raise ValueError("El nombre no puede estar vacío.")
        self._nombre = valor

    @property
    def precio_base(self):
        return self._precio_base

    @precio_base.setter
    def precio_base(self, valor):
        if valor < 0:
            raise ValueError("El precio no puede ser negativo.")
        self._precio_base = valor

    @property
    def plazas_max(self):
        return self._plazas_disponibles

    @plazas_max.setter
    def plazas_max(self, valor):
        if valor <= 0:
            raise ValueError("Las plazas deben ser mayores que 0.")
        self._plazas_disponibles = valor

    @property
    def plazas_disponibles(self):
        return self._plazas_disponibles

    @plazas_disponibles.setter
    def plazas_disponibles(self, valor):
        self._plazas_disponibles = valor

    @property
    def plazas_ocupadas(self):
        return self._plazas_ocupadas

    # -------- metodos --------
    def hay_lugar(self):
        return self._plazas_ocupadas < self._plazas_disponibles

    def reservar_plaza(self):
        if not self.hay_lugar():
            raise SinPlazasError(f"No hay plazas disponibles en {self.nombre}.")
        self._plazas_ocupadas += 1

    @abstractmethod
    def calcular_precio(self):
        pass


class ClaseColectiva(Actividad):
    def calcular_precio(self):
        return self._precio_base


class SesionPersonal(Actividad):
    def __init__(self, nombre, precio_base, plazas_disponibles, recargo):
        super().__init__(nombre, precio_base, plazas_disponibles)
        self.recargo = recargo

    def calcular_precio(self):
        return self._precio_base * (1 + self.recargo / 100)
