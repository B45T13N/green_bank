<template>
    <v-container>
        <v-card
            class="elevation-4 mt-15 form-details"
        >
            <v-card-title
                class="mb-0 mb-sm-5"
            >
                Le véhicule de vos rêves
            </v-card-title>
            <v-card-text>
                <v-form>
                    <SelectComponent label="Type de véhicule"
                                     :items="vehicleType"
                                     :isShown="vehicleTypeSelectIsShown"
                                     selectType="vehicleType"
                                     @inputChange="handleVehicleTypeSelection"
                    />
                    <SelectComponent label="Année de fabrication"
                                     :items="years"
                                     :isShown="yearSelectIsShown"
                                     selectType="year"
                                     @inputChange="handleYearSelection"
                    />

                    <SelectComponent label="Énergie"
                                     :items="energies"
                                     :isShown="energySelectIsShown"
                                     selectType="energy"
                                     @inputChange="handleEnergySelection"
                                     />

                    <SelectComponent label="Kilométrage annuel"
                                     :items="mileages"
                                     :isShown="mileageSelectIsShown"
                                     selectType="mileage"
                                     @inputChange="handleMileageSelection"
                    />

                    <SelectComponent label="Nombre de personnes dans le foyer"
                                     :items="passengers"
                                     :isShown="passengersSelectIsShown"
                                     selectType="passenger"
                                     @inputChange="handlePassengerSelection"
                    />
                </v-form>
            </v-card-text>
            <v-card-actions class="justify-space-around d-flex flex-sm-row flex-column mb-0 mb-sm-3">
                <router-link to="/">
                    <v-btn class="invalidate-button mb-3 mb-sm-0">Étape précédente</v-btn>
                </router-link>
                <router-link to="/result" v-if="validButtonIsShown">
                    <v-btn class="validate-button">Étape suivante</v-btn>
                </router-link>
            </v-card-actions>
        </v-card>
    </v-container>
</template>

<script>

    import SelectComponent from "@/components/SelectComponent.vue";
    export default {
        name: 'SimulatorComponent',
        components: {SelectComponent},
        data(){
            return {
                passengers: ['California', 'Colorado', 'Florida', 'Georgia', 'Texas', 'Wyoming'],
                mileages: ['California', 'Colorado', 'Florida', 'Georgia', 'Texas', 'Wyoming'],
                energies: ['California', 'Colorado', 'Florida', 'Georgia', 'Texas', 'Wyoming'],
                years: ['California', 'Colorado', 'Florida', 'Georgia', 'Texas', 'Wyoming'],
                vehicleType: ['California', 'Colorado', 'Florida', 'Georgia', 'Texas', 'Wyoming'],

                vehicleTypeSelectIsShown: true,
                yearSelectIsShown: false,
                energySelectIsShown: false,
                mileageSelectIsShown: false,
                passengersSelectIsShown: false,
                validButtonIsShown: false,
            }
        },
        methods: {
            handleVehicleTypeSelection(){
                this.yearSelectIsShown = true;
            },
            handleYearSelection(){
                this.energySelectIsShown = true;
            },
            handleEnergySelection(){
                this.mileageSelectIsShown = true;
            },
            handleMileageSelection(){
                this.passengersSelectIsShown = true;
            },
            handlePassengerSelection(){
                this.validButtonIsShown = true;
            }
        }
    }
</script>

<style scoped>
div.form-details{
    width: 700px;
}
</style>
