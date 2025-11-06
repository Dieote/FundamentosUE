public class Jugador {

public string Nombre {get; private set; }
public List<Carta> Mano { get; private set; }
public bool EsCrupier { get; private set; }

    public Jugador(string nombre, bool esCrupier = false){
        Nombre = nombre;
        EsCrupier = esCrupier;
        Mano = new List<Carta>();
    }
    public void RecibirCarta(Carta cartaNew){
        Mano.Add(cartaNew);
    }

    public int CalcularPuntaje(){
        int total = 0;
        int cantidadAs = 0;

        foreach (var carta in Mano){
            total += carta.Puntuacion;
            if (carta.Valor == "A"){
                cantidadAs++;
            }
        }

       // Ajustar Ases (vale 1 u 11
        while (cantidadAs > 0 && total + 10 <= 21) {
            total += 10; // Convierte un As de 1 a 11
            cantidadAs--;
        }

        return total;
    }

public bool SuperaPuntaje(){
     return CalcularPuntaje() > 21;
}

public bool PedirCarta(){
     return EsCrupier && CalcularPuntaje() <= 17; //El crupier pide cartas hasta que sea 17
}

    public override string ToString() {
        return $"{Nombre} tiene: {string.Join(", ", Mano)} (Puntuación: {CalcularPuntaje()})";
    }

        }