<template>
    <v-container class="h-75 w-100">
        <v-card
            class="elevation-4 result"
        >
            <v-card-title
                class="mb-5"
            >
                Selon votre simulation :
            </v-card-title>
            <v-card-text class="ml-3">
                <v-row class="mb-3">
                    Vous souhaitez un véhicule {{ vehicleType }} {{ energy }} datant des années {{ year }}.
                </v-row>
                <v-row class="mb-3">
                    Vous comptez rouler {{ mileage }} par an avec {{ passenger }}.
                </v-row>
                <v-row class="mb-3">Voici le taux d'emprunt selon ces critères : {{ finalBorrowingRate }}.</v-row>
                <v-row class="mb-3">
                    *Détail du calcul : {{ totalPoints }} / 40 soit un taux d'emprunt de {{ borrowingRate }} % avec {{ passenger }}
                    (soit {{ passengerDetail }})
                </v-row>
            </v-card-text>
            <v-card-actions class="justify-end mb-3 mr-2">
                <router-link to="#">
                    <v-btn class="validate-button--full-size">Contactez-nous !</v-btn>
                </router-link>
            </v-card-actions>
        </v-card>
    </v-container>
</template>

<script>
    export default {
        data(){
            return {
                vehicleType: '',
                energy: '',
                year: '',
                mileage: '',
                passenger: '',
                finalBorrowingRate: '',
                borrowingRate: '',
                totalPoints: '',
                passengerDetail: '',
            }
        },
        beforeMount() {
            this.getLocalStorageInfo();
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
        }
    }
</script>

<style lang="scss">
    div.result{
        width: 700px;
    }
</style>

