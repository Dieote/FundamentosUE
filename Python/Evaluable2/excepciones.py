class FitLifeError(Exception):
    """Excepción base del sistema FitLife"""
    pass


class SinPlazasError(FitLifeError):
    """Se lanza cuando no quedan plazas disponibles"""
    pass


class ReservaInvalidaError(FitLifeError):
    """Se lanza cuando una reserva no es válida"""
    pass
