      @if ($getAdmins->isNotEmpty())
          @foreach ($getAdmins as $admin)
              <tr>
                  <td>
                      @if (!empty($admin->image))
                          <img src="{{ asset('uploads/profile_pic/' . $admin->image) }}" class="img-fluid"
                              style="width: 100px; height:100px; object-fit:cover; border-radius:50%;">
                      @endif
                  </td>
                  <td>{{ $admin->name }}</td>
                  <td>{{ $admin->email }}</td>

                  <td>
                      @if (!empty($admin->status == 1))
                          <span class="badge bg-success">Active</span>
                      @else
                          <span class="badge bg-danger">Deactive</span>
                      @endif
                  </td>
                  <td>{{ \Carbon\Carbon::parse($admin->created_at)->format('d M,Y') }}</td>

                  <td><a href="{{ route('admin.edit', $admin->id) }}" class="btn btn-primary btn-sm"
                          style="background: #cc9966; border:none"><i class="bi bi-pencil-square"></i> Edit</a>
                      <a href="{{ route('admin.delete', $admin->id) }}"
                          onclick="return confirm('Are you sure you want delete record.')"
                          class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i> Delete</a>
                  </td>

              </tr>
          @endforeach
      @else
          <tr>
              <td colspan="7">No Record Found.</td>
          </tr>
      @endif
