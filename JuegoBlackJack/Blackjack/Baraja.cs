public class Baraja
{
    //Lista de cartas
    public List<Carta> Cartas { get; private set; }

public Baraja()
{

    Cartas = new List<Carta>();
    IniciarBaraja();
}

private void IniciarBaraja()
{

    string[] palos = { "Corazones", "Treboles", "Picas", "Diamantes" };
    string[] valores = { "A", "2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K" };

    foreach (var palo in palos)
    {
        foreach (var valor in valores)
        {
            int puntuacion = ObtenerPuntuacion(valor);
            Cartas.Add(new Carta(palo, valor, puntuacion));
        }
    }
}


private int ObtenerPuntuacion(string valor)
{
    switch (valor)
    {
        case "J":
        case "Q":
        case "K":
            return 10;
        case "A":
            return 1;
        default:
            return int.Parse(valor);
    }
}

public void Barajar()
{
    Random rnd = new Random(); // Crear un generador de números aleatorios
    int n = Cartas.Count;      //  Obtener el número total de cartas en la baraja
    while (n > 1)              //  Mientras haya cartas por mezclar
    {
        n--;
        int k = rnd.Next(n + 1); //  Generar un índice aleatorio entre 0 y n
        Carta value = Cartas[k]; //  Obtener la carta en la posición aleatoria
        Cartas[k] = Cartas[n];   // Intercambiar la carta aleatoria con la última carta no mezclada
        Cartas[n] = value;       //  Colocar la carta intercambiada en la posición final
    }
}

public Carta RepartirCarta()
{

    if (Cartas.Count == 0)
    {
        throw new InvalidOperationException("No hay cartas en la baraja.");
    }

    Carta carta = Cartas[0];
    Cartas.RemoveAt(0);
    return carta;
}
}