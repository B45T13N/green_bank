<template>
    <v-container class="h-75 w-100">
        <v-card
            class="elevation-4"
        >
            <v-card-title
                class="mb-5"
            >
                Green bank simulator
            </v-card-title>
            <v-card-text>
                <div class="mb-3">
                    La Green Bank, fondée en 2022, est une institution financière novatrice axée
                    sur la durabilité et l'impact environnemental positif. Son objectif principal est
                    de catalyser des investissements et des initiatives qui favorisent la transition
                    vers une économie verte et durable.
                </div>
                <div class="mb-3">
                    Répondant à la nécessité croissante de mesurer et de comprendre l'impact
                    environnemental des activités humaines, la Green Bank souhaite lancer un
                    outil de calcul de l'
                    empreinte écologique.
                </div>
                <div class="mb-3">
                    Cet outil interactif permet aux individus de quantifier leur impact sur
                    l'
                    environnement en termes de consommation d'énergie, d'émissions de gaz à
                    effet de serre et d'
                    utilisation des ressources naturelles.
                </div>
            </v-card-text>
            <v-card-actions class="justify-end mb-3">
                <router-link to="/simulator">
                    <v-btn class="validate-button--full-size">Simuler son taux d'emprunt</v-btn>
                </router-link>
            </v-card-actions>
        </v-card>
    </v-container>
</template>

<script>

    export default {
        name: 'HomeComponent',
        components: {},

        data(){
            return {
            }
        }
    }

</script>
