public class Carta {
    
public string Palo { get; private set; }
public string Valor { get; private set; }
public int Puntuacion { get; private set; }

    public Carta(string palo, string valor, int puntuacion)
    {
        Palo = palo;
        Valor = valor;
        Puntuacion = puntuacion;
    }

public override string ToString() //Para que se muestre "5 de Corazones"
    {
        return $"{Valor} de {Palo}";
    }
}