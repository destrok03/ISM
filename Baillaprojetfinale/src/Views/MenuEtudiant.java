package Views;
import java.util.Arrays;
import java.util.List;
import Services.*;
public class MenuEtudiant {
    private DemandeView demandeView;
    private String matriculeEtudiant;
    public MenuEtudiant(DemandeService demandeService, String matriculeEtudiant) {
        this.demandeView = new DemandeView(demandeService);
        this.matriculeEtudiant = matriculeEtudiant;
    }
    public void afficher() {
        List<String> options = Arrays.asList(
                "Faire une demande (suspension/annulation)",
                "Lister mes demandes",
                "Déconnexion"
        );
        int choix;
        do {
            choix = MenuUtils.afficherMenu("MENU ETUDIANT", options);
            switch (choix) {
                case 1: demandeView.creerDemandePourEtudiant(matriculeEtudiant); break;
                case 2: demandeView.listerDemandesParMatricule(matriculeEtudiant); break;
                case 3: System.out.println("Déconnexion..."); break;
            }
        } while (choix != 3);
    }
}
