import { Ref, computed, unref } from "vue";

export const useMonthlyPayment = (
    total: number,
    interestRate: number | Ref<number>,
    duration: number | Ref<number>
) => {
    const monthlyPayment = computed(() => {
        const principal = total;
        const monthlyInterest = unref(interestRate) / 100 / 12;
        const numberOfMonths = unref(duration) * 12;

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
