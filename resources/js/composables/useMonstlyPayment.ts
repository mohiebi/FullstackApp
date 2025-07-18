import { Ref, computed } from "vue"

export const useMonthlyPayment = (
    total: number,
    interestRate: Ref<number>,
    duration: Ref<number>
) => {
    const monthlyPayment = computed(() => {
        const principal = total;
        const monthlyInterest = interestRate.value / 100 / 12;
        const numberOfMonths = duration.value * 12;

        if (monthlyInterest === 0) {
            return principal / numberOfMonths;
        }

        return (
            principal *
            monthlyInterest *
            Math.pow(1 + monthlyInterest, numberOfMonths) /
            (Math.pow(1 + monthlyInterest, numberOfMonths) - 1)
        );
    });

    return monthlyPayment;
};
