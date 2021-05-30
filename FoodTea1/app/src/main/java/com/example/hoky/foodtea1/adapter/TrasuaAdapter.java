package com.example.hoky.foodtea1.adapter;

import android.content.Context;
import android.text.TextUtils;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.ImageView;
import android.widget.TextView;

import com.example.hoky.foodtea1.R;
import com.example.hoky.foodtea1.model.Sanpham;
import com.squareup.picasso.Picasso;

import java.text.DecimalFormat;
import java.util.ArrayList;

public class TrasuaAdapter extends BaseAdapter {

    Context context;
    ArrayList<Sanpham> arraytrasua;

    public TrasuaAdapter(Context context, ArrayList<Sanpham> arraytrasua) {
        this.context = context;
        this.arraytrasua = arraytrasua;
    }

    @Override
    public int getCount() {
        return arraytrasua.size();
    }

    @Override
    public Object getItem(int position) {
        return arraytrasua.get(position);
    }

    @Override
    public long getItemId(int position) {
        return position;
    }
    public class ViewHolder{
        public TextView txttentrasua,txtgiatrasua,txtmotatrasua;
        public ImageView imatrasua;
    }
    @Override
    public View getView(int position, View convertView, ViewGroup parent) {
        ViewHolder viewHolder = null;
         if (convertView == null){
            viewHolder = new ViewHolder();
            LayoutInflater inflater = (LayoutInflater) context.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
            convertView = inflater.inflate(R.layout.dong_trasua,null);

             viewHolder.txttentrasua = convertView.findViewById(R.id.textviewtrasua);
             viewHolder.txtgiatrasua = convertView.findViewById(R.id.textviewgiatrasua);
             viewHolder.txtmotatrasua = convertView.findViewById(R.id.textviewmotatrasua);
             viewHolder.imatrasua = convertView.findViewById(R.id.imageviewtrasua);
             convertView.setTag(viewHolder);
        }else {
             viewHolder = (ViewHolder) convertView.getTag();
         }
          Sanpham sanpham = (Sanpham) getItem(position);
         viewHolder.txttentrasua.setText(sanpham.getTensanpham());
        DecimalFormat decimalFormat = new DecimalFormat("###,###,###");
        viewHolder.txtgiatrasua.setText("Giá : " + decimalFormat.format(sanpham.getGiasanpham())+ " Đ");
        viewHolder.txtmotatrasua.setMaxLines(2);
        viewHolder.txtmotatrasua.setEllipsize(TextUtils.TruncateAt.END);
        viewHolder.txtmotatrasua.setText(sanpham.getMotasanpham());
        Picasso.get().load(sanpham.getHinhanhsanpham())
                .placeholder(R.drawable.noimage)
                .error(R.drawable.error)
                .into(viewHolder.imatrasua);
        return convertView;
    }
}
