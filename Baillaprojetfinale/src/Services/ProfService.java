package Services;

import Models.Prof;

import java.util.*;

public class ProfService {
    private List<Prof>profs=new ArrayList<>();
    public void ajouterProf(Prof p){
        profs.add(p);
    }
    public List<Prof> listerProfs() {
        return profs;
    }

    public Prof chercherParId(int id) {
        for (Prof p : profs) {
            if (p.getId()==id) return p;
        }
        return null;
    }
}
