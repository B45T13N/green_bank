<template>
    <v-container class="h-75 w-100">
        <v-card
            class="elevation-4 result"
        >
            <v-card-title
                class="mb-5"
            >
                Voici le taux d'emprunt selon ces critères : {{ finalBorrowingRate }}  %.
            </v-card-title>
            <v-card-text class="ml-3">
                <v-row class="mb-3">
                    Vous souhaitez une voiture de type {{ vehicleType.toLowerCase() }} {{ energy.toLowerCase() }} datant des années {{ year }}.
                </v-row>
                <v-row class="mb-3">
                    Vous comptez rouler {{ mileage }}.
                </v-row>
                <v-row class="font-italic">
                    *Détail du calcul : {{ finalGrading }} / 40 soit un taux d'emprunt de {{ borrowingRate }} % avec
                    {{ passenger }} personnes dans le même foyer (soit {{ bonus }} %)
                </v-row>
            </v-card-text>
            <v-card-actions class="justify-space-around d-flex flex-sm-row flex-column mb-0 mb-sm-3">
                <router-link to="/">
                    <v-btn class="invalidate-button mb-3 mb-sm-0">Recommencer</v-btn>
                </router-link>
                <router-link to="#">
                    <v-btn class="validate-button">Contactez-nous !</v-btn>
                </router-link>
            </v-card-actions>
        </v-card>
    </v-container>
</template>

<script>
    export default {
        data(){
            return {
                apiURL: import.meta.env.VITE_API_URL,
                vehicleType: '',
                energy: '',
                year: '',
                mileage: '',
                passenger: '',
                finalBorrowingRate: '',
                borrowingRate: '',
                finalGrading: '',
                bonus: '',
            }
        },
        beforeMount() {
            this.getLocalStorageInfo();
            this.getResult();
        },
        methods: {
            getLocalStorageInfo(){
                let passenger = localStorage.getItem('passenger');
                let energy = localStorage.getItem('energy');
                let mileage = localStorage.getItem('mileage');
                let year = localStorage.getItem('year');
                let vehicleType = localStorage.getItem('vehicleType');

                if (!passenger || passenger === '' ||
                    !energy || energy === '' ||
                    !mileage || mileage === '' ||
                    !year || year === '' ||
                    !vehicleType || vehicleType === '') {
                    this.$router.push('/simulator');
                }

                this.passenger = passenger
                this.energy = energy
                this.mileage = mileage
                this.year = year
                this.vehicleType = vehicleType
            },
            getResult(){
                axios.post(`${this.apiURL}/results`,
                    {
                        'vehicleType': this.vehicleType,
                        'passenger': this.passenger,
                        'energy': this.energy,
                        'year': this.year,
                        'mileage': this.mileage,
                    })
                    .then(response => {
                        let data = response.data;
                        this.bonus = data.bonus;
                        this.borrowingRate = data.borrowingRate;
                        this.finalBorrowingRate = data.finalBorrowingRate;
                        this.finalGrading = data.finalGrading;
                    })
                    .catch(error => {
                        console.error('Erreur lors de la récupération des types de véhicules :', error);
                    });
            }
        }
    }
</script>

<style lang="scss">
    div.result{
        width: 700px;
    }
</style>

