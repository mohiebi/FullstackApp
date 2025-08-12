declare namespace App.DTO {
    export type ListingData = {
        id: number;
        beds: number;
        baths: number;
        area: number;
        city: string;
        code: string;
        street: string;
        price: number;
        owner: App.DTO.UserData;
        images: Array<any>;
        offerMade: App.DTO.OfferData | null;
    };

    export type ListingImageData = {
        id: number;
        filename: string;
        src: string;
    };

    export type OfferData = {
        id: number;
        amount: number;
        accepted_at: string | null;
        rejected_at: string | null;
        bidder: App.DTO.UserData | null;
    };

    export type UserData = {
        id: number;
        name: string;
        email: string | null;
    };
}
