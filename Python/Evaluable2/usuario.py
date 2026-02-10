from abc import ABC, abstractmethod
# clase abstarcta abc

class Usuario(ABC):
    def __init__(self, nombre, email):
        self._nombre = nombre
        self._email = email

    @property # controla el acceos
    def nombre(self):
        return self._nombre
    # _ para encapsular
    @property
    def email(self):
        return self._email
    
#setters
    @nombre.setter
    def nombre(self, valor):
        if not valor:
            raise ValueError("El nombre no puede estar vacío.")
        self._nombre = valor
    @email.setter
    def email(self, valor):
        if not valor:
            raise ValueError("El email no puede estar vacío.")
        self._email = valor
        
class Cliente(Usuario):
    def __init__(self, nombre, email):
        super().__init__(nombre, email)
        self._reservas = []
        
    def agregar_reserva(self, reserva):
        self._reservas.append(reserva)
        
    def ver_reservas(self):
        if not self._reservas:
            print(f"El cliente {self.nombre} no tiene reservas.")
        else:
            print(f"Reservas de {self.nombre}:")
            for reserva in self._reservas:
                print(f"- {reserva}")
                
    def eliminar_reserva(self, indice):
        if  indice < 0 or indice >= len(self._reservas):
            raise ValueError("No se puede eliminar la reserva.")
        reserva = self._reservas.pop(indice)
        reserva.actividad.plazas_ocupadas -= 1 
        #libera la plaza al eliminar la reserva
                
class Entrenador(Usuario):
    def __init__(self, nombre, email, especialidad):
        super().__init__(nombre, email)
        self._especialidad = especialidad

    @property
    def especialidad(self):
        return self._especialidad
#setter
    @especialidad.setter
    def especialidad(self, valor):
        if not valor:
            raise ValueError("La especialidad no puede estar vacía.")
        self._especialidad = valor