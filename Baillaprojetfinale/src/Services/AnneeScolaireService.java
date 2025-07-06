package Services;
import Models.AnneeScolaire;
import java.util.*;
public class AnneeScolaireService {
    private List<AnneeScolaire> annees = new ArrayList<>();
    public AnneeScolaire trouverOuCreerAnnee(String libelle) {
        for (AnneeScolaire a : annees) {
            if (a.getLibelle().equalsIgnoreCase(libelle)) return a;
        }

        AnneeScolaire nouvelle = new AnneeScolaire();
        nouvelle.setLibelle(libelle);
        annees.add(nouvelle);
        return nouvelle;
    }

    public List<AnneeScolaire> listerAnnees() {
        return annees;
    }
}
