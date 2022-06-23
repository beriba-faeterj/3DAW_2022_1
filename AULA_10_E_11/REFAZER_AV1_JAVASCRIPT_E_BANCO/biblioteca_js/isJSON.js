// Veririca se uma string está em formato JSON
export function isJSON(string) {  
    try {
        JSON.parse(jsonStr);  
    } catch (e) {
        return false;
    }

    return true;
};
