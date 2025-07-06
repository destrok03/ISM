package Views;
import Services.DemandeService;
import Models.*;
import java.util.*;
public class DemandeView {
    private DemandeService demandeService;

    public DemandeView(DemandeService demandeService) {
        this.demandeService = demandeService;
    }

    public void creerDemandePourEtudiant(String matricule) {
        Scanner sc = new Scanner(System.in);
        System.out.print("Type de demande (SUSPENSION/ANNULATION) : ");
        String typeStr = sc.nextLine().toUpperCase();
        TypeDemande typeDemande = TypeDemande.valueOf(typeStr); 
        System.out.print("Motif : ");
        String motif = sc.nextLine();
        demandeService.creerDemande(matricule, typeDemande, motif);
        System.out.println("Demande créée !");
    }

    public void listerDemandesParMatricule() {
        Scanner sc = new Scanner(System.in);
        System.out.print("Matricule étudiant : ");
        String matricule = sc.nextLine();
        for (Demande d : demandeService.listerDemandesParMatricule(matricule)) {
            System.out.println(d);
        }
    }

    public void listerDemandesParMatricule(String matricule) {
        for (Demande d : demandeService.listerDemandesParMatricule(matricule)) {
            System.out.println(d);
        }
    }
}
