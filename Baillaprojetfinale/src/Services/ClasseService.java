package Services;

import Models.Classe;
import java.util.*;

public class ClasseService {
    private List<Classe> classes = new ArrayList<>();
    public ClasseService(List<Classe> classes) {
        this.classes = classes;
    }
    public void ajouterClasse(Classe c) {
        classes.add(c);
    }

    public List<Classe> listerClasses() {
        return classes;
    }

    public Classe chercherClasseParId(int id) {
        for (Classe c : classes) {
            if (c.getIdClasse() == id) {
                return c;
            }
        }
        return null;
    }
}
