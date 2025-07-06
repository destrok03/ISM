package Services;

import Models.Utilisateur;
import java.util.*;

public class UtilisateurService {
    private List<Utilisateur> utilisateurs = new ArrayList<>();

    public void ajouterUtilisateur(Utilisateur u) {
        utilisateurs.add(u);
    }

    public Utilisateur seConnecter(String login, String mdp) {
        for (Utilisateur u : utilisateurs) {
            if (u.getLogin().equals(login) && u.getMotDePasse().equals(mdp)) {
                return u;
            }
        }
        return null;
    }

    public List<Utilisateur> listerUtilisateurs() {
        return utilisateurs;
    }
}
