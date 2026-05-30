export type ListingData = {
    id: number;
    beds: number;
    baths: number;
    area: number;
    city: string;
    code: string;
    street: string;
    price: number;
    owner: UserData;
    images: Array<unknown>;
    offerMade: OfferData | null;
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
    bidder: UserData | null;
};

export type UserData = {
    id: number;
    name: string;
    email: string | null;
};
