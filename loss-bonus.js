const admin = require('firebase-admin');

// GitHub Secrets থেকে ফায়ারবেস কনফিগারেশন লোড করা
const serviceAccount = JSON.parse(process.env.FIREBASE_SERVICE_ACCOUNT);

admin.initializeApp({
  credential: admin.credential.cert(serviceAccount),
  databaseURL: "https://uk77-56f6d-default-rtdb.firebaseio.com" // তোমার প্রজেক্টের ডাটাবেজ ইউআরএল
});

const db = admin.database();

async function distributeLossBonus() {
  try {
    console.log("লস বোনাস প্রসেস শুরু হচ্ছে...");
    const usersRef = db.ref('users');
    const snapshot = await usersRef.once('value');
    
    if (!snapshot.exists()) {
      console.log("কোনো ইউজার পাওয়া যায়নি।");
      return;
    }

    const users = snapshot.val();
    const updates = {};

    for (let phone in users) {
      let user = users[phone];
      let totalLoss = user.totalLoss || 0; 
      
      if (totalLoss > 500) { // ৫০০ টাকার বেশি লস হলে ৫% বোনাস
        let bonusAmount = Math.round(totalLoss * 0.05);
        let currentBalance = user.balance || 0;
        
        updates[`users/${phone}/balance`] = currentBalance + bonusAmount;
        updates[`users/${phone}/lastLossBonus`] = bonusAmount;
        console.log(`ইউজার ${phone}-কে ৳${bonusAmount} লস বোনাস দেওয়া হলো।`);
      }
    }

    if (Object.keys(updates).length > 0) {
      await db.ref().update(updates);
      console.log("সকল যোগ্য ইউজারদের লস বোনাস সফলভাবে আপডেট করা হয়েছে।");
    } else {
      console.log("আজ কাউকে দেওয়ার মতো বোনাস প্রযোজ্য হয়নি।");
    }

    process.exit(0);
  } catch (error) {
    console.error("লস বোনাস দিতে সমস্যা হয়েছে:", error);
    process.exit(1);
  }
}

distributeLossBonus();
